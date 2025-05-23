<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 * @var \Cake\Collection\CollectionInterface|string[] $payers
 * @var \Cake\Collection\CollectionInterface|string[] $payees
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Transactions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="transactions form content">
            <?= $this->Form->create($transaction) ?>
            <fieldset>
                <legend><?= __('Add Transaction') ?></legend>
                <?php
                    echo $this->Form->control('payer_id', ['options' => $payers]);
                    echo $this->Form->control('payee_id', ['options' => $payees]);
                    echo $this->Form->control('amount');
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
