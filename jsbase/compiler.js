/**
 * JSBase Compiler - Transpila JSBase para JavaScript
 * Lexer → Parser → Code Generator
 */

class JSBaseCompiler {
  constructor() {
    this.tokens = [];
    this.current = 0;
    this.output = '';
    this.functions = {};
    this.blockStack = [];
  }

  /**
   * LEXER - Tokeniza o código JSBase
   */
  tokenize(code) {
    const lines = code.split('\n');
    this.tokens = [];
    
    for (let i = 0; i < lines.length; i++) {
      const line = lines[i].trim();
      if (!line || line.startsWith('//')) continue;
      
      this.tokens.push({
        line: i + 1,
        content: line,
        type: this.classifyLine(line)
      });
    }
    
    return this.tokens;
  }

  classifyLine(line) {
    const lower = line.toLowerCase();
    
    if (/^numero|^texto|^booleano/.test(lower)) return 'DECLARATION';
    if (/^mostrar/.test(lower)) return 'PRINT';
    if (/^ler/.test(lower)) return 'INPUT';
    if (/^se\s+/.test(lower)) return 'IF';
    if (/^senao|^senão/.test(lower)) return 'ELSE';
    if (/^fimse/.test(lower)) return 'ENDIF';
    if (/^enquanto/.test(lower)) return 'WHILE';
    if (/^fimenquanto/.test(lower)) return 'ENDWHILE';
    if (/^para\s+/.test(lower)) return 'FOR';
    if (/^fimpara/.test(lower)) return 'ENDFOR';
    if (/^funcao\s+/.test(lower)) return 'FUNCTION';
    if (/^fimfuncao/.test(lower)) return 'ENDFUNCTION';
    if (/^retornar|^devolver/.test(lower)) return 'RETURN';
    if (/^\w+\s+recebe/.test(line)) return 'ASSIGNMENT';
    
    return 'EXPRESSION';
  }

  /**
   * PARSER & CODE GENERATOR
   */
  compile(code) {
    this.tokenize(code);
    this.output = '';
    this.blockStack = [];
    this.functions = {};
    
    // Primeira passagem: extrair funções
    for (let i = 0; i < this.tokens.length; i++) {
      const token = this.tokens[i];
      if (token.type === 'FUNCTION') {
        i = this.extractFunction(i);
      }
    }
    
    // Gerar código das funções
    this.output += this.generateFunctions();
    
    // Segunda passagem: compilar código principal
    for (let i = 0; i < this.tokens.length; i++) {
      const token = this.tokens[i];
      
      if (token.type === 'FUNCTION') {
        // Pular funções já extraídas
        while (i < this.tokens.length && this.tokens[i].type !== 'ENDFUNCTION') {
          i++;
        }
        continue;
      }
      
      this.compileLine(token);
    }
    
    // Validar blocos
    if (this.blockStack.length > 0) {
      throw new Error(`Bloco '${this.blockStack[this.blockStack.length - 1].type}' não foi fechado`);
    }
    
    return this.output;
  }

  extractFunction(startIdx) {
    const funcLine = this.tokens[startIdx].content;
    const match = funcLine.match(/^funcao\s+(\w+)\s*\((.*?)\)/i);
    
    if (!match) throw new Error(`Sintaxe de função inválida na linha ${this.tokens[startIdx].line}`);
    
    const funcName = match[1];
    const params = match[2];
    const body = [];
    
    let i = startIdx + 1;
    while (i < this.tokens.length && this.tokens[i].type !== 'ENDFUNCTION') {
      body.push(this.tokens[i]);
      i++;
    }
    
    this.functions[funcName] = { params, body };
    return i;
  }

  generateFunctions() {
    let output = '';
    
    for (const [name, func] of Object.entries(this.functions)) {
      const params = this.parseArguments(func.params)
        .map(p => p.replace(/^(numero|texto|booleano|inteiro|decimal)\s+/i, '').trim())
        .join(', ');
      
      output += `function ${name}(${params}) {\n`;
      
      // Compilar corpo da função
      const savedOutput = this.output;
      this.output = '';
      
      for (const token of func.body) {
        this.compileLine(token);
      }
      
      output += this.output;
      this.output = savedOutput;
      output += `}\n\n`;
    }
    
    return output;
  }

  compileLine(token) {
    const line = token.content;
    const lower = line.toLowerCase();
    
    try {
      switch (token.type) {
        case 'DECLARATION':
          this.output += this.compileDeclaration(line) + '\n';
          break;
        
        case 'ASSIGNMENT':
          this.output += this.compileAssignment(line) + '\n';
          break;
        
        case 'PRINT':
          this.output += this.compilePrint(line) + '\n';
          break;
        
        case 'INPUT':
          this.output += this.compileInput(line) + '\n';
          break;
        
        case 'IF':
          this.blockStack.push({ type: 'IF', line: token.line });
          this.output += this.compileIf(line) + '\n';
          break;
        
        case 'ELSE':
          if (!this.blockStack.length || this.blockStack[this.blockStack.length - 1].type !== 'IF') {
            throw new Error(`'senao' sem 'se' correspondente na linha ${token.line}`);
          }
          this.output += '} else {\n';
          break;
        
        case 'ENDIF':
          if (!this.blockStack.length || this.blockStack[this.blockStack.length - 1].type !== 'IF') {
            throw new Error(`'fimse' sem 'se' correspondente na linha ${token.line}`);
          }
          this.blockStack.pop();
          this.output += '}\n';
          break;
        
        case 'WHILE':
          this.blockStack.push({ type: 'WHILE', line: token.line });
          this.output += this.compileWhile(line) + '\n';
          break;
        
        case 'ENDWHILE':
          if (!this.blockStack.length || this.blockStack[this.blockStack.length - 1].type !== 'WHILE') {
            throw new Error(`'fimenquanto' sem 'enquanto' correspondente na linha ${token.line}`);
          }
          this.blockStack.pop();
          this.output += '}\n';
          break;
        
        case 'FOR':
          this.blockStack.push({ type: 'FOR', line: token.line });
          this.output += this.compileFor(line) + '\n';
          break;
        
        case 'ENDFOR':
          if (!this.blockStack.length || this.blockStack[this.blockStack.length - 1].type !== 'FOR') {
            throw new Error(`'fimpara' sem 'para' correspondente na linha ${token.line}`);
          }
          this.blockStack.pop();
          this.output += '}\n';
          break;
        
        case 'RETURN':
          this.output += this.compileReturn(line) + '\n';
          break;
        
        case 'EXPRESSION':
          // Tentar compilar como chamada de função
          if (/^\w+\s*\(/.test(line)) {
            this.output += this.compileFunctionCall(line) + ';\n';
          }
          break;
      }
    } catch (error) {
      throw new Error(`Erro na linha ${token.line}: ${error.message}`);
    }
  }

  compileDeclaration(line) {
    // numero idade recebe 25
    const match = line.match(/^(numero|texto|booleano|inteiro|decimal)\s+(\w+)\s+recebe\s+(.+)$/i);
    if (!match) throw new Error('Sintaxe de declaração inválida');
    
    const [, type, name, value] = match;
    const jsValue = this.translateExpression(value);
    return `let ${name} = ${jsValue};`;
  }

  compileAssignment(line) {
    // idade recebe 30
    const match = line.match(/^(\w+)\s+recebe\s+(.+)$/i);
    if (!match) throw new Error('Sintaxe de atribuição inválida');
    
    const [, name, value] = match;
    const jsValue = this.translateExpression(value);
    return `${name} = ${jsValue};`;
  }

  compilePrint(line) {
    // mostrar "texto", variavel, 42
    const match = line.match(/^mostrar\s+(.+)$/i);
    if (!match) throw new Error('Sintaxe de mostrar inválida');
    
    const args = match[1];
    const parts = this.parseArguments(args);
    const jsArgs = parts.map(p => this.translateExpression(p)).join(', ');
    return `console.log(${jsArgs});`;
  }

  compileInput(line) {
    // texto nome recebe ler("Qual é seu nome?")
    const match = line.match(/^(numero|texto|booleano|inteiro|decimal)\s+(\w+)\s+recebe\s+ler\s*\((.*?)\)$/i);
    if (!match) throw new Error('Sintaxe de ler inválida');
    
    const [, type, name, prompt] = match;
    return `let ${name} = prompt(${this.translateExpression(prompt)});`;
  }

  compileIf(line) {
    // se idade maior ou igual 18
    const match = line.match(/^se\s+(.+)$/i);
    if (!match) throw new Error('Sintaxe de se inválida');
    
    const condition = this.translateExpression(match[1]);
    return `if (${condition}) {`;
  }

  compileWhile(line) {
    // enquanto i menor ou igual 10
    const match = line.match(/^enquanto\s+(.+)$/i);
    if (!match) throw new Error('Sintaxe de enquanto inválida');
    
    const condition = this.translateExpression(match[1]);
    return `while (${condition}) {`;
  }

  compileFor(line) {
    // para (numero i recebe 1; i menor ou igual 10; i recebe i+1)
    const match = line.match(/^para\s*\((.*?);(.*?);(.*?)\)$/i);
    if (!match) throw new Error('Sintaxe de para inválida');
    
    const [, init, cond, incr] = match;
    try {
      const jsInit = this.compileDeclaration(init.trim()).replace(';', '');
      const jsCond = this.translateExpression(cond.trim());
      const jsIncr = this.compileAssignment(incr.trim()).replace(';', '');
      return `for (${jsInit}; ${jsCond}; ${jsIncr}) {`;
    } catch (e) {
      // Se falhar como declaração, tentar como atribuição
      const jsInit = this.compileAssignment(init.trim()).replace(';', '');
      const jsCond = this.translateExpression(cond.trim());
      const jsIncr = this.compileAssignment(incr.trim()).replace(';', '');
      return `for (${jsInit}; ${jsCond}; ${jsIncr}) {`;
    }
  }

  compileReturn(line) {
    // retornar valor
    const match = line.match(/^(retornar|devolver)\s+(.+)$/i);
    if (!match) throw new Error('Sintaxe de retornar inválida');
    
    const value = this.translateExpression(match[2]);
    return `return ${value};`;
  }

  compileFunctionCall(line) {
    // saudacao()
    const match = line.match(/^(\w+)\s*\((.*?)\)$/);
    if (!match) throw new Error('Sintaxe de chamada de função inválida');
    
    const [, funcName, args] = match;
    const jsArgs = args ? this.parseArguments(args).map(a => this.translateExpression(a)).join(', ') : '';
    return `${funcName}(${jsArgs})`;
  }

  translateExpression(expr) {
    let result = expr
      .replace(/\bverdadeiro\b/gi, 'true')
      .replace(/\bfalso\b/gi, 'false')
      .replace(/\bmaior ou igual\b/gi, '>=')
      .replace(/\bmenor ou igual\b/gi, '<=')
      .replace(/\bmaior que\b/gi, '>')
      .replace(/\bmenor que\b/gi, '<')
      .replace(/\bdiferente\b/gi, '!=')
      .replace(/\bigual\b/gi, '==')
      .replace(/\be\b/gi, '&&')
      .replace(/\bou\b/gi, '||')
      .replace(/\btamanho\s*\(\s*([^)]+)\s*\)/gi, '($1).length')
      .replace(/\bmaiusculo\s*\(\s*([^)]+)\s*\)/gi, '($1).toUpperCase()')
      .replace(/\bminusculo\s*\(\s*([^)]+)\s*\)/gi, '($1).toLowerCase()')
      .replace(/\baleatorio\s*\(\s*(\d+)\s*,\s*(\d+)\s*\)/gi, 'Math.floor(Math.random() * ($2 - $1 + 1) + $1)')
      .replace(/\binteiro\s*\(\s*([^)]+)\s*\)/gi, 'Math.floor($1)')
      .replace(/\bdecimal\s*\(\s*([^)]+)\s*\)/gi, 'Number($1)')
      .replace(/\btexto\s*\(\s*([^)]+)\s*\)/gi, 'String($1)')
      .replace(/\bbooleano\s*\(\s*([^)]+)\s*\)/gi, 'Boolean($1)')
      .replace(/\bhoje\s*\(\s*\)/gi, 'new Date().toLocaleDateString("pt-BR")')
      .replace(/\bhora\s*\(\s*\)/gi, 'new Date().toLocaleTimeString("pt-BR")')
      .replace(/\blimpar\s*\(\s*\)/gi, 'console.clear()');
    
    return result;
  }

  parseArguments(argsStr) {
    if (!argsStr.trim()) return [];
    
    const args = [];
    let current = '';
    let inString = false;
    let stringChar = '';
    let parenDepth = 0;
    
    for (let i = 0; i < argsStr.length; i++) {
      const char = argsStr[i];
      
      if ((char === '"' || char === "'") && (i === 0 || argsStr[i - 1] !== '\\')) {
        if (!inString) {
          inString = true;
          stringChar = char;
        } else if (char === stringChar) {
          inString = false;
        }
      }
      
      if (!inString) {
        if (char === '(') parenDepth++;
        if (char === ')') parenDepth--;
      }
      
      if (char === ',' && !inString && parenDepth === 0) {
        args.push(current.trim());
        current = '';
      } else {
        current += char;
      }
    }
    
    if (current.trim()) args.push(current.trim());
    return args;
  }
}

// Exportar para uso global
if (typeof module !== 'undefined' && module.exports) {
  module.exports = JSBaseCompiler;
}
