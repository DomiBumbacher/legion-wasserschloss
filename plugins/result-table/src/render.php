<?php
/**
 * @see https://github.com/WordPress/gutenberg/blob/trunk/docs/reference-guides/block-api/block-metadata.md#render
 */
?>


	 <?php 
        // Get data
        $ch1 = curl_init();
        curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch1, CURLOPT_URL, 'https://api-v2.swissunihockey.ch/api/rankings?league=' . $attributes['league'] . '&group=Gruppe+' . $attributes['group'] . '&game_class=' . $attributes['game_class'] . '&season=' . $attributes['season']);
        $result1 = curl_exec($ch1);
        curl_close($ch1);   
        $object1 = json_decode($result1);
    
        $i = 0;

        foreach ($object1->data->regions as $region){
            if (count($object1->data->regions) > 1){
                echo '<h4>Gruppe ' . $region->text . '</h4>';
            }
            ?>

        <div class="table-responsive">
            <table class="table table-striped">
            <?php 
                // Ohne Verlängerung
				if(count($object1->data->headers) == 10){ ?>
                    <thead>
                    <tr>
                        <th>Rang</th>
                        <th class="borderRight">Team</th>
                        <th class="text-center">Sp</th>
                        <th class="text-center">S</th>
                        <th class="text-center">U</th>
                        <th class="text-center borderRight">N</th>
                        <th class="text-center">+</th>
                        <th class="text-center">-</th>
                        <th class="text-center borderRight">TD</th>
                        <th class="text-center">P</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($object1->data->regions[$i]->rows as $row){ 
                            // Split +:- Bilanz
                            $resultSplit = explode (":", $row->cells[7]->text[0]);
                            $scoredGoals = $resultSplit[0];
                            $concededGoals = $resultSplit[1];

                            if (strpos($row->cells[2]->text[0], 'Legion Wasserschloss') !== false){
                                echo '<tr class="lws">';
                            } else{
                                echo '<tr>';
                            } ?>
                                <td class="text-center"><?php echo $row->cells[0]->text[0] ?>.</td> 
                                <td class="borderRight"><?php echo $row->cells[2]->text[0] ?></td> 
                                <td class="text-center"><?php echo $row->cells[3]->text[0] ?></td> 
                                <td class="text-center"><?php echo $row->cells[4]->text[0] ?></td> 
                                <td class="text-center"><?php echo $row->cells[5]->text[0] ?></td> 
                                <td class="text-center borderRight"><?php echo $row->cells[6]->text[0] ?></td>
                                <td class="text-center"><?php echo $scoredGoals ?></td>
                                <td class="text-center"><?php echo $concededGoals ?></td>
                                <td class="text-center borderRight"><?php echo $row->cells[8]->text[0] ?></td>
                                <td class="text-center"><?php echo $row->cells[9]->text[0] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    
                <?php } 
				// Mit Verlängerung
				elseif(count($object1->data->headers) == 11){ ?>
                    <thead>
                    <tr>
                        <th>Rang</th>
						<th class="borderRight">Team</th>
						<th class="text-center">Sp</th>
						<th class="text-center">S</th>
						<th class="text-center">SnV</th>
						<th class="text-center">NnV</th>
						<th class="text-center borderRight">N</th>
						<th class="text-center">+</th>
						<th class="text-center">-</th>
						<th class="text-center borderRight">TD</th>
						<th class="text-center">P</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($object1->data->regions[$i]->rows as $row){ 
                            // Split +:- Bilanz
                            $resultSplit = explode (":", $row->cells[8]->text[0]);
                            $scoredGoals = $resultSplit[0];
                            $concededGoals = $resultSplit[1];

                            if (strpos($row->cells[2]->text[0], 'Legion Wasserschloss') !== false){
                                echo '<tr class="lws">';
                            } else{
                                echo '<tr>';
                            } ?>
                                <td class="text-center"><?php echo $row->cells[0]->text[0] ?>.</td>
                                <td class="borderRight"><?php echo $row->cells[2]->text[0] ?></td>
                                <td class="text-center"><?php echo $row->cells[3]->text[0] ?></td>
                                <td class="text-center"><?php echo $row->cells[4]->text[0] ?></td>
                                <td class="text-center"><?php echo $row->cells[5]->text[0] ?></td>
                                <td class="text-center"><?php echo $row->cells[6]->text[0] ?></td>
                                <td class="text-center borderRight"><?php echo $row->cells[7]->text[0] ?></td>
                                <td class="text-center"><?php echo $scoredGoals ?></td>
                                <td class="text-center"><?php echo $concededGoals ?></td>
                                <td class="text-center borderRight"><?php echo $row->cells[9]->text[0] ?></td>
                                <td class="text-center"><?php echo $row->cells[10]->text[0] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php } 
				// Ohne Verlängerung + Corona (Punktequotient)
                elseif(count($object1->data->headers) == 12){ ?>
                    <thead>
                    <tr>
                        <th>Rang</th>
                        <th class="borderRight">Team</th>
                        <th class="text-center">Sp</th>
                        
                        <th class="text-center borderRight">SoW</th>
                        <th class="text-center">S</th>
                        <th class="text-center">U</th>
                        <th class="text-center borderRight">N</th>
                        <th class="text-center">+</th>
                        <th class="text-center">-</th>
                        <th class="text-center borderRight">TD</th>
                        <th class="text-center">PQ</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($object1->data->regions[$i]->rows as $row){ 
                            // Split +:- Bilanz
                            $resultSplit = explode (":", $row->cells[8]->text[0]);
                            $scoredGoals = $resultSplit[0];
                            $concededGoals = $resultSplit[1];

                            if (strpos($row->cells[2]->text[0], 'Legion Wasserschloss') !== false){
                                echo '<tr class="lws">';
                            } else{
                                echo '<tr>';
                            } ?>
                                <td class="text-center"><?php echo $row->cells[0]->text[0] ?>.</td>
                                <td class="borderRight"><?php echo $row->cells[2]->text[0] ?></td>
                                <td class="text-center"><?php echo $row->cells[3]->text[0] ?></td>
                                <td class="text-center borderRight"><?php echo $row->cells[4]->text[0] ?></td>
                                <td class="text-center"><?php echo $row->cells[5]->text[0] ?></td>
                                <td class="text-center"><?php echo $row->cells[6]->text[0] ?></td>
                                <td class="text-center borderRight"><?php echo $row->cells[7]->text[0] ?></td>
                                <td class="text-center"><?php echo $scoredGoals ?></td>
                                <td class="text-center"><?php echo $concededGoals ?></td>
                                <td class="text-center borderRight"><?php echo $row->cells[9]->text[0] ?></td>
                                <td class="text-center"><?php echo $row->cells[10]->text[0] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    
                <?php } 
                // Mit Verlängerung + Corona (Punktequotient)
                elseif(count($object1->data->headers) == 13){ ?>
                    <thead>
                        <tr>
                            <th>Rang</th>
                            <th class="borderRight">Team</th>
                            <th class="text-center">Sp</th>
                            <th class="text-center borderRight">SoW</th>
                            <th class="text-center">S</th>
                            <th class="text-center">SnV</th>
                            <th class="text-center">NnV</th>
                            <th class="text-center borderRight">N</th>
                            <th class="text-center">+</th>
                            <th class="text-center">-</th>
                            <th class="text-center borderRight">TD</th>
                            <th class="text-center">PQ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($object1->data->regions[$i]->rows as $row){ 
                            // Split +:- Bilanz
                            $resultSplit = explode (":", $row->cells[9]->text[0]);
                            $scoredGoals = $resultSplit[0];
                            $concededGoals = $resultSplit[1];

                            if (strpos($row->cells[2]->text[0], 'Legion Wasserschloss') !== false){
                                echo '<tr class="lws">';
                            } else{
                                echo '<tr>';
                            } ?>
                                <td class="text-center"><?php echo $row->cells[0]->text[0] ?>.</td>
                                <td class="borderRight"><?php echo $row->cells[2]->text[0] ?></td>
                                <td class="text-center"><?php echo $row->cells[3]->text[0] ?></td>
                                <td class="text-center borderRight"><?php echo $row->cells[4]->text[0] ?></td>
                                <td class="text-center"><?php echo $row->cells[5]->text[0] ?></td>
                                <td class="text-center"><?php echo $row->cells[6]->text[0] ?></td>
                                <td class="text-center"><?php echo $row->cells[7]->text[0] ?></td>
                                <td class="text-center borderRight"><?php echo $row->cells[8]->text[0] ?></td>
                                <td class="text-center"><?php echo $scoredGoals ?></td>
                                <td class="text-center"><?php echo $concededGoals ?></td>
                                <td class="text-center borderRight"><?php echo $row->cells[10]->text[0] ?></td>
                                <td class="text-center"><?php echo $row->cells[11]->text[0] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php } ?>
            </table>
        </div>
        <?php 

            $i++;
        }?>
