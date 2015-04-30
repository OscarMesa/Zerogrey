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
        <tfoot>
            <tr>
                <th>Id</th>
                <th>Fuente</th>
                <th>Usuario</th>
                <th>Ubicacón</th>
                <th>Descripción</th>
            </tr>
        </tfoot>
</table>
<script type="text/javascript">
    $(document).ready(function(){
         $('#example').dataTable( {
        "scrollY":        "500px",
        "scrollCollapse": true,
        "paging":         false,
        "processing": true,
        "serverSide": true,
        "ajax": "<?php echo Yii::app()->createAbsoluteUrl('twitter/getDataByAjax');?>"
    } );
    });
</script>