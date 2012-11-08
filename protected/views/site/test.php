<?php
/* @var $this SiteController
   $data string
*/

$this->pageTitle=Yii::app()->name;
?>

<h1>Yahoo!</h1>

<table>
    <tr>
<?php
        list($keys, $headers) = each($data);
        foreach ($headers as $var) {
?>
        <th><?php echo $var ?></th>
<?php
        }
?>
    </tr>

<?php while (list($keys, $values) = each($data)) { ?>
    <tr>
    <?php foreach ($values as $val) { ?>
        <td><?php echo $val ?></td>
    <?php } ?>
    </tr>
<?php } ?>
</table>
