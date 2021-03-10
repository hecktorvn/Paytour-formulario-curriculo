<div class="container d-flex align-items-center justify-content-center flex-column" style="min-height: 100vh;">
    <h1 class="mb-2 logo">{!! file_get_contents('https://www.paytour.com.br/wp-content/uploads/2020/02/Logo_PayTour.svg') !!}</h1>

    <div class="card" style="max-width: 600px;">
        <div class="card-body">
            <h5 class="card-title text-center">Formulário de envio de Currículo</h5>

            <hr>

            @if($success)
                <div class="alert alert-success" role="alert">
                    Currículo enviado com sucesso!
                </div>
            @endif

            <form wire:submit.prevent="send()" class="row g-3">


                <div>

                    <label for="name" class="form-label">Nome</label>

                    <input wire:model="name" id="name" autofocus type="text" class="form-control" required>

                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror

                </div>



                <div class="col">

                    <label for="email" class="form-label">Email</label>

                    <input wire:model="email" id="email" type="email" class="form-control" required>

                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror

                </div>



                <div class="col-4">

                    <label for="phone" class="form-label">Telefone</label>

                    <input wire:model="phone" id="phone" type="text" class="form-control" required>

                    @error('phone') <small class="text-danger">{{ $message }}</small> @enderror

                </div>



                <div>

                    <label for="office" class="form-label">Cargo Desejado</label>

                    <input wire:model="office" id="office" type="text" class="form-control" required>

                    @error('office') <small class="text-danger">{{ $message }}</small> @enderror

                </div>



                <div>

                    <label for="schooling" class="form-label">Escolaridade</label>

                    <select wire:model="schooling" id="schooling" class="form-select" required>
                        <option value=""></option>
                        <option value="1">Fundamental</option>
                        <option value="2">Médio</option>
                        <option value="3">Superior (Graduação)</option>
                        <option value="4">Pós-graduação</option>
                        <option value="5">Mestrado</option>
                        <option value="6">Doutorado</option>
                        <option value="7">Escola</option>
                    </select>

                    @error('schooling') <small class="text-danger">{{ $message }}</small> @enderror

                </div>



                <div>

                    <label for="note" class="form-label">Observação</label>

                    <textarea wire:model="note" id="note" cols="30" rows="4" class="form-control"></textarea>

                </div>



                <div>
                    <label for="curriculo" class="form-label">Currículo</label>

                    <input wire:model="file" type="file" id="curriculo" accept=".doc,.docx,.pdf" class="form-control" required>

                    @error('file') <small class="text-danger">{{ $message }}</small> @enderror
                </div>



                <div>
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </div>

            </form>

        </div>
    </div>

</div>
