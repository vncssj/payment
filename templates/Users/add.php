<div class="row w-100">
    <div class="col-md-6 offset-md-3">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Novo Usuário') ?></legend>
                <?php
                echo $this->Form->control('name', ['class' => 'form-control mt-2']);
                echo $this->Form->control('email', ['class' => 'form-control mt-2']);
                echo $this->Form->control('type', ['class' => 'form-control mt-2', 'empty' => 'Selecione', 'options' => ['common' => 'Cliente', 'shopkeeper' => 'Logista']]);
                echo $this->Form->control('document', ['class' => 'form-control mt-2']);
                echo $this->Form->control('password', ['class' => 'form-control mt-2']);
                ?>
            </fieldset>
            <div class="d-grid">
                <?= $this->Form->button(__('Concluir cadastro'), ['class' => 'btn btn-success mt-3']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script>
    var type = document.querySelector('#type');

    function maskCpfCnpj(value) {
        value = value.replace(/\D/g, '');

        if (type.value === 'common') {
            value = value.slice(0, 11);
            return value
                .replace(/^(\d{3})(\d)/, '$1.$2')
                .replace(/^(\d{3})\.(\d{3})(\d)/, '$1.$2.$3')
                .replace(/^(\d{3})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3-$4');
        } else {
            value = value.slice(0, 14);
            return value
                .replace(/^(\d{2})(\d)/, '$1.$2')
                .replace(/^(\d{2})\.(\d{3})(\d)/, '$1.$2.$3')
                .replace(/^(\d{2})\.(\d{3})\.(\d{3})(\d)/, '$1.$2.$3/$4')
                .replace(/^(\d{2})\.(\d{3})\.(\d{3})\/(\d{4})(\d)/, '$1.$2.$3/$4-$5');
        }
    }

    document.getElementById('document')
        .addEventListener('input', function() {
            this.value = maskCpfCnpj(this.value);
        });

    type.addEventListener('change', (evt) => {
        document.querySelector("label[for='document']").innerHTML = type.value === 'common' ? 'Document (CPF)' : 'Document (CNPJ)';
        document.querySelector("#document").value = "";
    })
</script>