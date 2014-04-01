<?php
    $id = $_GET['id'];
    if (isset($id) && !empty($id)){
        require_once '../database/consultas.php';
        $consulta = new Consulta();
        $consulta->setConsulta("SELECT * FROM sie.programs
            WHERE STRATEGIC_LINE_ID LIKE $id");
        $consulta_prgm = $consulta->getConsulta();
        while ($row_prgm = mysql_fetch_array($consulta_prgm)) {
            $status_prg = "INACTIVO";
            if ($row_prgm['PROGRAM_STATUS' == 1]){
                $status_prg = "ACTIVO";
            }
?>
        <tr>
            <td><?php print $row_prgm['PROGRAM_ID'] ?></td>
            <td><?php print $row_prgm['PROGRAM_NAME'] ?></td>
            <td><?php print $status_prg ?></td>
            <td><?php print $row_prgm['PROGRAM_WEIGHTING'] ?></td>
            <td><a type="button" href="http://localhost/SIE_V2/view/admin/programs.php?id=<?php print $row_prgm['PROGRAM_ID'] ?>" class="btn btn-primary" title="Editar"><i class="icon-edit"></i></a></td>
        </tr>
<?php   } }?>