<div class="welcome-container">
    <div class="welcome-content">
        <article class="welcome-card">
            <div class="welcome-inner">
                <h2 class="welcome-title">Selamat Datang</h2>
                <p class="welcome-text">
                    Wadah pemeliharaan kesehatan yang dilakukan dari, oleh dan untuk masyarakat yang dibimbing petugas terkait.
                </p>
                <div class="welcome-buttons">
                    <a href="#/register" class="btn welcome-btn primary">Daftar Akun</a>
                    <p class="welcome-or">Atau</p>
                    <a href="#/login" class="btn welcome-btn secondary">Login</a>
                </div>
            </div>
        </article>
    </div>
</div>

<style>
.welcome-container {
    min-height: 100vh;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.welcome-content {
    width: 100%;
    max-width: 500px;
    margin: 0 auto;
}

.welcome-card {
    background: #D4BEE4;
    border-radius: 15px;
    padding: 2rem;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.welcome-title {
    color: #fff;
    font-size: 2rem;
    margin-bottom: 1.5rem;
    text-align: center;
}

.welcome-text {
    color: #fff;
    font-size: 1rem;
    line-height: 1.5;
    margin-bottom: 2rem;
    text-align: center;
}

.welcome-buttons {
    display: flex;
    flex-direction: column;
    gap: 1rem;
}

.welcome-btn {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    font-size: 1.1rem;
    text-decoration: none;
    text-align: center;
    transition: opacity 0.3s ease;
}

.welcome-btn.primary {
    background: #9B7EBD;
    border-color: #9B7EBD;
    color: white;
}

.welcome-btn.secondary {
    background: #3B1E54;
    border-color: #3B1E54;
    color: white;
}

.welcome-or {
    color: #fff;
    text-align: center;
    margin: 0.5rem 0;
}

/* Mobile Responsive */
@media (max-width: 768px) {
    .welcome-container {
        padding: 15px;
        min-height: 90vh;
    }
    
    .welcome-card {
        padding: 1.5rem;
    }
    
    .welcome-title {
        font-size: 1.75rem;
    }
    
    .welcome-text {
        font-size: 0.9rem;
    }
}

@media (max-width: 480px) {
    .welcome-title {
        font-size: 1.5rem;
    }
    
    .welcome-btn {
        font-size: 1rem;
        padding: 10px;
    }
    
    .welcome-or {
        margin: 0.3rem 0;
    }
}
</style>