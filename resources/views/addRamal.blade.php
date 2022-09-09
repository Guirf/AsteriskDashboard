<x-app-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <h5>
            Adicionar ramal
          </h5>
          <form method="POST" class="form-group " action="/novoRamal">
            @csrf
            <div class="row">
              <div class="form-group col-lg-3">
                <label for="ramalnum">Numero do ramal</label>
                <input type="text" class="form-control @if($errors->has('ramalnum')) is-invalid @endif" aria-describedby="ramalnum" name="ramalnum">
                {{-- validação --}}
                @if($errors->has('ramalnum'))
                  <div class="invalid-feedback">
                    @foreach($errors->get('ramalnum') as $error)
                    {{$error}}
                    @endforeach
                  </div>
                  @endif
                {{-- fimvalidação --}}
              </div>

              <div class="form-group col-lg-3">
                <label for="Senha">Senha</label>
                <input type="text" class="form-control @if($errors->has('senha')) is-invalid @endif " name="senha">
                {{-- validação --}}
                @if($errors->has('Senha'))
                  <div class="invalid-feedback">
                    @foreach($errors->get('senha') as $error)
                    {{$error}}
                    @endforeach
                  </div>
                  @endif
                {{-- fimvalidação --}}
              </div>

            </div>
            <div class="row">

              <div class="form-group col-lg-3">
                <label for="nome">Nome</label>
                <input type="text" class="form-control @if($errors->has('callerid')) is-invalid @endif " name="callerid">
                {{-- validação --}}
                @if($errors->has('callerid'))
                  <div class="invalid-feedback">
                    @foreach($errors->get('callerid') as $error)
                    {{$error}}
                    @endforeach
                  </div>
                  @endif
                {{-- fimvalidação --}}
              </div>

              <div class="form-group col-lg-3">
                <label for="Setor">Setor</label>
                <input type="text" class="form-control @if($errors->has('setor')) is-invalid @endif " name="setor">
                {{-- validação --}}
                @if($errors->has('setor'))
                  <div class="invalid-feedback">
                    @foreach($errors->get('setor') as $error)
                    {{$error}}
                    @endforeach
                  </div>
                  @endif
                {{-- fimvalidação --}}
              </div>

            </div>
            <br>
            <button type="submit" class="btn btn-primary">Adicionar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>