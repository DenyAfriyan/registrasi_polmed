    
    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="nk-sidebar">           
        <div class="nk-nav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-label">Dashboard</li>
                <li>
                    <a class="" href="<?=base_url()?>" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-note menu-icon"></i><span class="nav-text">Daftar Persetujuan UKT</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="<?=base_url()?>/dashboard/perubahan_ukt">Permohonan Perubahan UKT</a></li>
                    </ul>
                </li>
                <li>
                    <a class="" href="<?=base_url()?>/dashboard/biodata_mahasiswa" aria-expanded="false">
                        <i class="icon-notebook menu-icon"></i><span class="nav-text">Biodata dan Berkas Mahasiswa</span>
                    </a>
                </li>
                <li>
                    <a class="" href="<?=base_url()?>/dashboard/status_mahasiswa" aria-expanded="false">
                        <i class="icon-notebook menu-icon"></i><span class="nav-text">Status Registrasi mahasiswa</span>
                    </a>
                </li>
                
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
