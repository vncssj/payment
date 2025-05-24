<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="form-signin w-100 m-auto">
                <?= $this->Flash->render() ?>
                <?= $this->Form->create() ?>
                <h1 class="h3 mb-3 fw-normal">Login PaymentApp</h1>
                <div class="form-floating">

                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Senha</label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Entrar</button>
                <?= $this->Form->end() ?>
                <div class="mt-3">
                    Não tem conta?
                    <?= $this->Html->link("Cadastre-se", ['action' => 'add']) ?>
                </div>
            </div>
        </div>
    </div>
</div>