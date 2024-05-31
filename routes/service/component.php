<?php
//COMPINENT FROM MODEL
ob_end_clean();
include_once "model/".$paras[0].'.php';
$entity =$paras[0];
$model = $m[$paras[0]];
$route = $m[$paras[0]];
$load = 'const load = () => {'; //initial load of the table with all options for fkeys
$data = 'const data = reactive({'; //initial data with empty arrays for each table
$new = '{'; // new instance of the main entity


echo '
<template>
    '.$entity.'
    <q-list bordered separator class="q-ma-md">
    <q-item clickable v-for="('.$entity.', i) in data.'.$entity.'" :key="i">
';



foreach ($model as $key => $props){
  $type = $props[0];

    if ($type=='fkey'){
      //load options
      $load.='
      api.get("'.$key.'").then((res) => {
        data.'.$key.' = res.data.data.'.$key.';   
      });';

      //add empty array to data
    }

    if (!in_array($type, ['id', 'rkey'])){
      //add to empty array for create
      $new.=$key.': "", ';
    }

    
    switch ($type) 
    {
        case 'id':
        case 'password':
        case 'token':
            break;
        case 'int':
        case 'float':
            echo '
            <q-item-section style="max-width: 100px">
                <q-input outlined v-model="'.$entity.'.'.$key.'" type="number" label="'.$key.'" />
            </q-item-section>
            ';
            break;
        case 'fkey':
          echo '        
          <q-item-section>
            <q-select outlined v-model="'.$entity.'.'.$key.'.id" option-value="id" option-label="name" :options="data.'.$key.'" label="'.$key.'" emit-value map-options/>
          </q-item-section>';

          break;
          case 'date':
            
            echo '<q-item-section>'.$key.'
              <q-date
              v-model="'.$entity.'.'.$key.'"
              mask="YYYY-MM-DD"
              minimal
              />
            </q-item-section>';
            break;
          case 'bool':
            echo '        
            <q-item-section style="max-width: 40px">
            '.$key.'
              <q-checkbox 
              true-value="1"
              false-value="0"
              v-model="'.$entity.'.'.$key.'" />
            </q-item-section>';
            break;
        case 'rkey':
            break;
        default: 
            echo '
            <q-item-section>
                <q-input outlined v-model="'.$entity.'.'.$key.'" label="'.$key.'" />
            </q-item-section>
            ';
            break;
        
    }
}


$load.='
    api.get("'.$entity.'").then((res) => {
    data.'.$entity.' = res.data.data.'.$entity.';   
    data.'.$entity.'.push('.$new.'});
});';


echo '<q-item-section side>
<q-btn color="primary" icon="edit" @click="datian.update('.$entity.', \''.$entity.'\')" v-if="'.$entity.'.id" />
<q-btn color="positive" icon="add" @click="datian.create('.$entity.', \''.$entity.'\', data.'.$entity.')" v-else />

</q-item-section>
<q-item-section side>
<q-btn color="negative" icon="delete" @click="datian.delete('.$entity.', \''.$entity.'\', data.'.$entity.', i)" v-if="'.$entity.'.id" />
</q-item-section>';
echo '</q-item>';
echo '
    </q-list>
    </template>
';

echo '<script setup>
import { api, datian} from "boot/axios";
import { onMounted, reactive, ref } from "vue";
';

$data.='});';
echo $data;



echo '
onMounted(() => {
  load();
});
';


$load.='}';
echo $load;

echo '
</script>
';
exit();
?>