<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>


 <?php 
    // Get data
        $ch2 = curl_init();
        curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch2, CURLOPT_URL, 'https://api-v2.swissunihockey.ch/api/games?mode=team&season=' . $attributes['season']  . '&team_id=' . $attributes['teamid']  . '&games_per_page=500');
        $result2 = curl_exec($ch2);
        curl_close($ch2);   
        $object2 = json_decode($result2);
    ?>
    
    <div class="table-responsive">  
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Datum</th>
                    <th>Heimteam</th>
                    <th>Gastteam</th>
                    <th>Spielhalle</th>
                    <th>Resultat</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($object2->data->regions[0]->rows as $row) { ?>
                    <tr>
                        <td><?php echo $row->cells[0]->text[0] ?><br>
                        <?php echo $row->cells[0]->text[1] ?></td>
                        <td><?php echo $row->cells[2]->text[0] ?></td>
                        <td><?php echo $row->cells[3]->text[0] ?></td>
                        <td><a href="https://www.google.ch/maps?q=<?php echo $row->cells[1]->link->y; ?>,<?php echo $row->cells[1]->link->x ?>" target="_blank">
                        <?php echo $row->cells[1]->text[0] ?><br>
                        <?php echo $row->cells[1]->text[1] ?></a></td>
                        <td><?php echo $row->cells[4]->text[0] ?></td>
                    </tr>
                <?php }?>
                
            </tbody>
        </table>
    </div>