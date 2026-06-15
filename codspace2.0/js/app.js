document.addEventListener('DOMContentLoaded', () => {
    // Tab switching logic for Auth page
    const tabBtns = document.querySelectorAll('.tab-btn');
    const formContainers = document.querySelectorAll('.form-container');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const targetId = btn.getAttribute('data-target');
            
            // Update buttons
            tabBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            
            // Update forms
            formContainers.forEach(form => {
                form.style.display = 'none';
                if (form.id === targetId) {
                    form.style.display = 'block';
                }
            });
        });
    });

    // Modal logic
    const modalTriggers = document.querySelectorAll('[data-modal]');
    const modalOverlays = document.querySelectorAll('.modal-overlay');

    modalTriggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            const modalId = trigger.getAttribute('data-modal');
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = 'flex';
            }
        });
    });

    modalOverlays.forEach(overlay => {
        overlay.addEventListener('click', (e) => {
            if (e.target === overlay || e.target.closest('.modal-close')) {
                overlay.style.display = 'none';
            }
        });
    });

    // Image preview logic
    const fileInputs = document.querySelectorAll('input[type="file"][data-preview]');
    fileInputs.forEach(input => {
        input.addEventListener('change', function() {
            const previewId = this.getAttribute('data-preview');
            const previewImg = document.getElementById(previewId);
            const file = this.files[0];
            
            if (file && previewImg) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    previewImg.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
});

// Toast notification system
const toast = {
    show(message, type = 'success') {
        const container = document.getElementById('toast-container') || this.createContainer();
        const el = document.createElement('div');
        el.className = `toast toast-${type}`;
        el.textContent = message;
        
        container.appendChild(el);
        
        setTimeout(() => {
            el.classList.add('show');
            setTimeout(() => {
                el.classList.remove('show');
                setTimeout(() => el.remove(), 300);
            }, 3000);
        }, 10);
    },
    createContainer() {
        const container = document.createElement('div');
        container.id = 'toast-container';
        document.body.appendChild(container);
        return container;
    }
};

// Add toast styles dynamically
const style = document.createElement('style');
style.textContent = `
    #toast-container {
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        z-index: 1000;
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }
    .toast {
        padding: 1rem 1.5rem;
        background: var(--bg-card);
        color: white;
        border-radius: 8px;
        box-shadow: var(--shadow);
        border-left: 4px solid var(--primary);
        transform: translateX(120%);
        transition: transform 0.3s ease;
        min-width: 250px;
    }
    .toast.show {
        transform: translateX(0);
    }
    .toast-success { border-left-color: var(--success); }
    .toast-error { border-left-color: var(--danger); }
`;
document.head.appendChild(style);
