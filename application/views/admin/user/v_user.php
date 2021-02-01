<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-inbox bg-blue"></i>
                        <div class="d-inline">
                            <h5>Data User</h5>
<!--                             <span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
-->                        </div>
</div>
</div>
<div class="col-lg-4">
    <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="../index.html"><i class="ik ik-home"></i></a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">User</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Data User</li>
        </ol>
    </nav>
</div>
</div>
</div>


<div class="card" style="padding: 20px">
    <div class="card-header">
        <h3>Data User</h3>
    </div>
    <div class="card-body">
        <div style="padding-bottom: : 0px;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#demoModal">Tambah</button>
        </div>
        <br>
        <div class="table">
            <table id="lang-dt"
            class="table table-bordered">
            <thead class="" >
                <tr align="center">
                    <th>No.</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Level</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($user as $u) : ?>
                <tr align="center">
                    <td><?php echo $no++; ?></td>
                    <td><?= $u['nama_lengkap']; ?></td>
                    <td><?= $u['username']; ?></td>
                    <td><?= $u['email']; ?></td>
                    <td>
                        <?php if($u['level'] == 'ADM'){
                            echo "Admin";
                        } 
                        ?>
                        
                    </td>
                    <td>
                        <?php if($u['status'] == 1) {
                            echo "<span class='badge badge-pill badge-success mb-1'>Aktif</span>";
                        } elseif ($u['status']==0) {
                            echo "<span class='badge badge-pill badge-danger mb-1'>Tidak AKtif</span>";                    } 
                            ?>

                        </td>
                        <td>
                           <button type="button" class="btn social-btn btn-warning"><i class="fa fa-pencil-alt"></i></button>
                           <button type="button" class="btn social-btn btn-danger"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>

        </table>
    </div>
</div>
</div>
<!-- Language - Comma Decimal Place table end -->

<!-- modal tambah -->
<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="demoModalLabel">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div class="row">
                <div class="col-sm-12">
                    <div class="input-group input-group-secondary">
                     
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
                    </div>
                </div>
            </div> 


             <div class="row">
                <div class="col-sm-12">
                    <div class="input-group input-group-secondary">
                       
                        <input type="text" name="username" class="form-control" placeholder="username" required>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group input-group-secondary">
                        
                        <input type="password" name="password" class="form-control" placeholder="password" required>
                    </div>
                </div>
            </div> 
            <div class="row">
                <div class="col-sm-12">
                    <div class="input-group input-group-secondary">
                       
                        <input type="text" name="email" class="form-control" placeholder="ex : mail@domain.com " required="">
                    </div>
                </div>
            </div> 



        </div>
        <div class="modal-footer">
           <button type="button" class="btn btn-primary">Save changes</button>
           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

       </div>
   </div>
</div>
</div>


</div>
</div>
