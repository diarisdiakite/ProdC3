<h1>
Ministries trainings choices
<?= $this->Text->toList(h($trainings)) ?>
</h1>
<section>
<?php foreach ($ministries as $ministry): ?>
<article>
<!-- Utilise le HtmlHelper pour créer un lien -->
<h4><?= $this->Html->link($ministry->name, $ministry->slug) ?></h4>
<small><?= h($ministry->slug) ?></small>
<!-- Utilise le TextHelper pour formater le texte -->
<?= $this->Text->autoParagraph(h($ministry->team_id)) ?>
</article>
<?php endforeach; ?>
</section>