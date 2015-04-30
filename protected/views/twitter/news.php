<table id="example" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Fuente</th>
                <th>Usuario</th>
                <th>Ubicacón</th>
                <th>Descripción</th>
            </tr>
        </thead>
<?php
echo '<pre>';
foreach ($tweets->statuses as $t) {
    echo "<tr>";
    echo "<td>".$t->id_str."</td>";
    echo "<td>".$t->source."</td>";
    echo "<td>".$t->user->screen_name."</td>";
    echo "<td>".$t->user->location."</td>";
    echo "<td>".$t->text."</td>";
    echo "</tr>";
}

?>
</table>
<script type="text/javascript">
    $(document).ready(function(){
         $('#example').dataTable( {
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         false
    } );
    });
</script>