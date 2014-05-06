<?php
    $id = $_GET['id'];
    if (isset($id) && !empty($id)){
        require_once '../database/consultas.php';
        $consulta = new Consulta();
        $consulta->setConsulta("SELECT * FROM sie.programs
            WHERE STRATEGIC_LINE_ID LIKE $id");
        $consulta_prgm = $consulta->getConsulta();
        while ($row_prgm = mysql_fetch_array($consulta_prgm)) {
?>
        <tr>
            <td><?php print $row_prgm['PROGRAM_ID'] ?></td>
            <td><?php print $row_prgm['PROGRAM_NAME'] ?></td>
            <td><?php if ($row_prgm['PROGRAM_STATUS'] == 1){ print "ACTIVO";}else{print "INACTIVO";} ?></td>
            <td><?php print $row_prgm['PROGRAM_WEIGHTING'] ?></td>
            <td class="visible-desktop"><a type="button" href="../../view/admin/programs.php?id=<?php print $row_prgm['PROGRAM_ID'] ?>" class="btn btn-primary" title="Editar"><i class="icon-edit"></i></a></td>
        </tr>
<?php   } }?>