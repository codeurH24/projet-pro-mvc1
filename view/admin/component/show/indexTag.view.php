<form method="post" class="arrayHTML">
  <table>
      <h2>Tags <a href="/admin/tagComponent/creer-un-tag-<?= $component->id ?>.php"><i class="fas fa-2x fa-plus-circle"></i></a> </h2>
    <tbody>
      <?php
      foreach ($tags as $tag) {
        ?>
        <tr>
          <td style="width:80%"><?= $tag->tag ?></td>
          <td><a href="/admin/tagComponent/modifier-un-tag-<?= $tag->id ?>.php"><i class="fas fa-2x fa-pen-alt"></i></a></td>
          <td><a href="/admin/tagComponent/supprimer-tag-<?= $tag->id ?>.php"><i class="fas fa-2x fa-trash"></i></a></td>
        </tr>
        <?php
      } ?>
  </tbody>
  </table>
</form>
