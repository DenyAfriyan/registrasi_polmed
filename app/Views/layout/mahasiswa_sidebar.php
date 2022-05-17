    
    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="nk-sidebar">           
        <div class="nk-nav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-label">Dashboard</li>
                <li>
                    <a class="" href="<?= base_url() ?>/mahasiswa" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>
              	<?php if($userPayment['virtual_account'] != null) : ?>
                <li>
                    <a class="" href="<?= base_url()?>/mahasiswa/pembayaran " aria-expanded="false">
                        <i class="icon-notebook menu-icon"></i><span class="nav-text">Pembayaran</span>
                    </a>
                </li>
              	<?php endif; ?>
              	<?php if($userPayment['status_pembayaran'] == "Lunas") : ?>
                <li>
                    <a class="" href="<?= base_url()?>/mahasiswa/biodata_diri " aria-expanded="false">
                        <i class="icon-note menu-icon"></i><span class="nav-text">Biodata</span>
                    </a>
                </li>
              	<?php endif; ?>
                <li>
                    <a class="" href="/auth/logout" aria-expanded="false">
                        <i class="icon-key menu-icon"></i><span class="nav-text">Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->
