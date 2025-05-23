<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Transaction $transaction
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Transaction'), ['action' => 'edit', $transaction->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Transaction'), ['action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Transactions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Transaction'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="transactions view content">
            <h3><?= h($transaction->status) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($transaction->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Payer') ?></th>
                    <td><?= $transaction->hasValue('payer') ? $this->Html->link($transaction->payer->name, ['controller' => 'Users', 'action' => 'view', $transaction->payer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Payee') ?></th>
                    <td><?= $transaction->hasValue('payee') ? $this->Html->link($transaction->payee->name, ['controller' => 'Users', 'action' => 'view', $transaction->payee->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($transaction->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($transaction->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($transaction->created) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>