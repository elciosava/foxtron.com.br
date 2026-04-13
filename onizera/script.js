document.addEventListener('DOMContentLoaded', () => {
    const copyButtons = document.querySelectorAll('.btn-copy');
    const toast = document.getElementById('toast');
    const toastText = document.getElementById('toastText');
    const subscribeBtn = document.getElementById('subscribeBtn');
    const shareBtn = document.getElementById('shareBtn');

    // Copy Coupon Functionality
    copyButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            const coupon = button.getAttribute('data-coupon');
            
            navigator.clipboard.writeText(coupon).then(() => {
                showToast(`"${coupon}" copiado!`);
                
                // Visual feedback
                button.innerHTML = '<i class="fas fa-check"></i> COPIADO';
                button.style.opacity = '0.8';
                
                setTimeout(() => {
                    button.innerHTML = '<i class="fas fa-copy"></i> COPIAR';
                    button.style.opacity = '1';
                }, 2000);
            }).catch(err => {
                console.error('Erro ao copiar: ', err);
                showToast('Erro ao copiar cupom!');
            });
        });
    });

    // Subscribe Button
    if (subscribeBtn) {
        subscribeBtn.addEventListener('click', () => {
            const isSubscribed = subscribeBtn.classList.contains('subscribed');
            
            if (!isSubscribed) {
                subscribeBtn.classList.add('subscribed');
                subscribeBtn.innerHTML = '<i class="fas fa-check"></i> <span>INSCRITO</span>';
                showToast('Obrigado por se inscrever!');
                
                // Simular desinscrição após 5 segundos
                setTimeout(() => {
                    subscribeBtn.classList.remove('subscribed');
                    subscribeBtn.innerHTML = '<i class="fas fa-bell"></i> <span>INSCREVER</span>';
                }, 5000);
            }
        });
    }

    // Share Button
    if (shareBtn) {
        shareBtn.addEventListener('click', () => {
            if (navigator.share) {
                navigator.share({
                    title: 'ONIZERA - CS2 CUPONS',
                    text: 'Confira os melhores cupons de CS2 do Onizera!',
                    url: window.location.href
                }).catch(console.error);
            } else {
                // Fallback para copiar link
                navigator.clipboard.writeText(window.location.href).then(() => {
                    showToast('Link copiado para compartilhar!');
                });
            }
        });
    }

    // Show Toast Notification
    function showToast(message) {
        toastText.textContent = message;
        toast.classList.add('show');
        
        setTimeout(() => {
            toast.classList.remove('show');
        }, 3000);
    }

    // Add click animation to coupon cards
    const couponCards = document.querySelectorAll('.coupon-card');
    couponCards.forEach(card => {
        card.addEventListener('click', function() {
            // Trigger ripple effect
            const ripple = document.createElement('div');
            ripple.style.position = 'absolute';
            ripple.style.width = '20px';
            ripple.style.height = '20px';
            ripple.style.background = 'rgba(255, 255, 255, 0.5)';
            ripple.style.borderRadius = '50%';
            ripple.style.pointerEvents = 'none';
            ripple.style.animation = 'ripple-animation 0.6s ease-out';
            
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = size + 'px';
            ripple.style.height = size + 'px';
            ripple.style.left = '50%';
            ripple.style.top = '50%';
            ripple.style.transform = 'translate(-50%, -50%)';
            
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });

    // Add ripple animation keyframes
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple-animation {
            from {
                transform: translate(-50%, -50%) scale(0);
                opacity: 1;
            }
            to {
                transform: translate(-50%, -50%) scale(1);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);

    // Parallax effect on mouse move
    document.addEventListener('mousemove', (e) => {
        const orbs = document.querySelectorAll('.glow-orb');
        const x = e.clientX / window.innerWidth;
        const y = e.clientY / window.innerHeight;
        
        orbs.forEach((orb, index) => {
            const speed = (index + 1) * 10;
            orb.style.transform = `translate(${x * speed}px, ${y * speed}px)`;
        });
    });
});
