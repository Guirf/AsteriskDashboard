<form >
    <button wire:click.prevent="logIn"  class="btn btn-primary">Logar</button><br><br>
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

    <button  wire:click.prevent="logOut" class="btn btn-danger">Deslogar</button><br>
    <div>   
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
    </div>
    <br>
    <button  wire:click.prevent="paused" class="btn btn-warning">Pausar</button><br>
    <div>
        @if (session()->has('paused'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Pausado com sucesso!',
                    showConfirmButton: false,
                    timer: 2000,
                    toast: true
                })
            </script>
        @endif
    </div>
    <br>
    <button  wire:click.prevent="unpaused" class="btn btn-warning">Despausar</button><br>
    <div>
        @if (session()->has('unpaused'))
            <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Despausado com sucesso!',
                    showConfirmButton: false,
                    timer: 2000,
                    toast: true
                })
            </script>
        @endif
    </div>
</form>