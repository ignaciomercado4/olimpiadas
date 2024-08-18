<div class="alert alert-warning text-center">
    <p>Este link está disponible solo para <span class="fw-bolder">Administradores</span>. Redireccionando al inicio en <span id="countdown">5</span>...</p>
</div>

<script>
    let countdown = 5;
    const countdownElement = document.getElementById('countdown');

    const interval = setInterval(() => {
        countdown--;
        countdownElement.textContent = countdown;
        if (countdown === 0) {
            clearInterval(interval);
            window.location.href = "{{ route('homepage') }}";
        }
    }, 1000);
</script>
