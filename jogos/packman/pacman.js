const canvas = document.getElementById("gameCanvas");
const ctx = canvas.getContext("2d");

const pacMan = {
    x: canvas.width / 2,
    y: canvas.height / 2,
    radius: 20,
    startAngle: 0.2,
    endAngle: 1.8,
    direction: "right",
    speed: 2,
};

document.addEventListener("keydown", function(event) {
    if (event.key === "ArrowRight") {
        pacMan.direction = "right";
    } else if (event.key === "ArrowLeft") {
        pacMan.direction = "left";
    } else if (event.key === "ArrowUp") {
        pacMan.direction = "up";
    } else if (event.key === "ArrowDown") {
        pacMan.direction = "down";
    }
});

function drawPacMan() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    ctx.beginPath();
    ctx.arc(pacMan.x, pacMan.y, pacMan.radius, pacMan.startAngle * Math.PI, pacMan.endAngle * Math.PI);
    ctx.lineTo(pacMan.x, pacMan.y);
    ctx.fillStyle = "yellow";
    ctx.fill();
    ctx.closePath();
}

function updatePacMan() {
    // Mude o ângulo de acordo com a direção
    if (pacMan.direction === "right") {
        pacMan.startAngle = 0.2;
        pacMan.endAngle = 1.8;
    } else if (pacMan.direction === "left") {
        pacMan.startAngle = 1.2;
        pacMan.endAngle = 0.8;
    } else if (pacMan.direction === "up") {
        pacMan.startAngle = 1.7;
        pacMan.endAngle = 1.3;
    } else if (pacMan.direction === "down") {
        pacMan.startAngle = 0.7;
        pacMan.endAngle = 0.3;
    }

    // Mova o Pac-Man na direção correta
    if (pacMan.direction === "right") {
        pacMan.x += pacMan.speed;
    } else if (pacMan.direction === "left") {
        pacMan.x -= pacMan.speed;
    } else if (pacMan.direction === "up") {
        pacMan.y -= pacMan.speed;
    } else if (pacMan.direction === "down") {
        pacMan.y += pacMan.speed;
    }

    // Verifique se o Pac-Man atingiu as bordas e o reposicione
    if (pacMan.x > canvas.width + pacMan.radius) {
        pacMan.x = -pacMan.radius;
    } else if (pacMan.x < -pacMan.radius) {
        pacMan.x = canvas.width + pacMan.radius;
    }

    if (pacMan.y > canvas.height + pacMan.radius) {
        pacMan.y = -pacMan.radius;
    } else if (pacMan.y < -pacMan.radius) {
        pacMan.y = canvas.height + pacMan.radius;
    }
}

function gameLoop() {
    drawPacMan();
    updatePacMan();

    requestAnimationFrame(gameLoop);
}

gameLoop();
