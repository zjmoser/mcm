<?php
/* @var $this NewsFeedWidget */
/* @var $title article title */
/* @var $description article description */
/* @var $url article url */
/* @var $img article url */

$domain = parse_url($url, PHP_URL_HOST);
?>

<table>
    <tr>
        <td class="img">
            <a href="<?php echo $url; ?>" target="_blank"><img src="<?php echo $img; ?>" alt="Moser Capital"/></a>
        </td>
        <td class="text">
            <h5><a href="<?php echo $url; ?>" target="_blank"><?php echo $title; ?></a></h5>
            <p><?php echo $domain; ?></p>
        </td>
    </tr>
</table>
