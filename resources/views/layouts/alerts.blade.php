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
@if (session()->has('teste'))
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