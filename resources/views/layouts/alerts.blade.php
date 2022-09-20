@if (session()->has('login'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Logado com sucesso!',
        showConfirmButton: false,
        timer: 2000,
        toast: true
    })
    </script>
@endif

@if (session()->has('alreadyloged'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'info',
        title: 'Você já está logado nessa fila!',
        showConfirmButton: false,
        timer: 2000,
        toast: true
    })
    </script>
@endif
@if (session()->has('paused'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'info',
        title: 'Pausado com sucesso!',
        showConfirmButton: false,
        timer: 2000,
        toast: true
    })
    </script>
@endif

@if (session()->has('logout'))
    <script>
        Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Deslogado com sucesso!',
        showConfirmButton: false,
        timer: 2000,
        toast: true
    })
    </script>
@endif