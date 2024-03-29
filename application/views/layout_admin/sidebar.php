        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="index.html" class="app-brand-link">
                    <!-- <span class="app-brand-logo demo">
                        <img src="https://ifoxsoft.com/wp-content/uploads/2022/11/PMI-Logo-Vector-PNG-%E2%80%93-IfoxSoft.Com_.webp" width="60">
                    </span> -->
                    <span class="app-brand-text demo menu-text fw-bolder ms-2 text-primary">Seblang Wangi</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <?php if ($this->session->userdata('role') == 'superadmin') : ?>
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/dashboard" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <!-- E-Donor -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-donate-blood"></i>
                            <div data-i18n="E-Donor">E-Donor</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/donor/stok_donor" class="menu-link">
                                    <div data-i18n="Stok Donor">Stok Donor</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/donor/mobile_unit" class="menu-link">
                                    <div data-i18n="Mobile Unit">Mobile Unit</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/donor/penghargaan" class="menu-link">
                                    <div data-i18n="Penghargaan">Penghargaan</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- E-Event -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                            <div data-i18n="E-Event">E-Event</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/event/event" class="menu-link">
                                    <div data-i18n="Event">Event</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/event/sertifikat" class="menu-link">
                                    <div data-i18n="Sertifikat">Sertifikat</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/event/history" class="menu-link">
                                    <div data-i18n="History">History</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- E-Logistik -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-package"></i>
                            <div data-i18n="E-Logistik">E-Logistik</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/logistik/aset_gedung" class="menu-link">
                                    <div data-i18n="Aset Gedung">Aset Gedung</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/logistik/aset_tanah" class="menu-link">
                                    <div data-i18n="Aset Tanah">Aset Tanah</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/logistik/aset_kantor" class="menu-link">
                                    <div data-i18n="Aset Kantor">Aset Kantor</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/logistik/aset_mesin" class="menu-link">
                                    <div data-i18n="Aset Mesin">Aset Mesin</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/logistik/aset_kendaraan" class="menu-link">
                                    <div data-i18n="Aset Kendaraan">Aset Kendaraan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/logistik/barang_darurat_bencana" class="menu-link">
                                    <div data-i18n="Barang Darurat Bencana">Barang Darurat Bencana</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- E-Bencana -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-alarm-exclamation"></i>
                            <div data-i18n="E-Bencana">E-Bencana</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/bencana/pelaporan" class="menu-link">
                                    <div data-i18n="Pelaporan">Pelaporan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="menu-link">
                                    <div data-i18n="Infografis">Infografis</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- E-Relawan -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-user-plus"></i>
                            <div data-i18n="E-Relawan">E-Relawan</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/relawan/unit" class="menu-link">
                                    <div data-i18n="Unit">Unit</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/relawan/relawan?unit=PMR-MULA" class="menu-link">
                                    <div data-i18n="Relawan">Relawan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/relawan/kinerja" class="menu-link">
                                    <div data-i18n="Kinerja">Kinerja</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/relawan/tugas" class="menu-link">
                                    <div data-i18n="Tugas">Tugas</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/relawan/daftar_tilik" class="menu-link">
                                    <div data-i18n="Daftar Tilik">Daftar Tilik</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- E-Yankes -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-plus-medical"></i>
                            <div data-i18n="E-Yankes">E-Pelayanan Sosial & Kesehatan</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/yankes/sosial" class="menu-link">
                                    <div data-i18n="Pelayanan Sosial">Pelayanan Sosial</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/yankes/kesehatan" class="menu-link">
                                    <div data-i18n="Pelayanan Kesehatan">Pelayanan Kesehatan</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- E-User -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/user" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user"></i>
                            <div data-i18n="Users">Users</div>
                        </a>
                    </li>
                </ul>
            <?php elseif ($this->session->userdata('role') == 'unit') : ?>
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>unit/dashboard" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <!-- E-Relawan -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>unit/relawan/unit?page=detail" class="menu-link">
                            <!-- <i class="menu-icon tf-icons bx bx-shield-plus"></i> -->
                            <i class='menu-icon tf-icons bx bx-unite'></i>
                            <!-- <i class='bx bx-shield-plus'></i> -->
                            <div data-i18n="Analytics">Unit</div>
                        </a>
                    </li>
                    <!-- E-Event -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                            <div data-i18n="E-Event">E-Event</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= base_url() ?>unit/event/event" class="menu-link">
                                    <div data-i18n="Event">Event</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>unit/event/pengajuan" class="menu-link">
                                    <div data-i18n="Pengajuan">Pengajuan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>unit/event/sertifikat" class="menu-link">
                                    <div data-i18n="Sertifikat">Sertifikat</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>unit/event/history" class="menu-link">
                                    <div data-i18n="History">History</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            <?php elseif ($this->session->userdata('role') == 'udd') : ?>
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>admin/dashboard/udd" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>
                    <!-- E-Donor -->
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-donate-blood"></i>
                            <div data-i18n="E-Donor">E-Donor</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/donor/stok_donor" class="menu-link">
                                    <div data-i18n="Stok Donor">Stok Donor</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/donor/mobile_unit" class="menu-link">
                                    <div data-i18n="Mobile Unit">Mobile Unit</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>admin/donor/penghargaan" class="menu-link">
                                    <div data-i18n="Penghargaan">Penghargaan</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            <?php else : ?>
                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item">
                        <a href="<?= base_url() ?>relawan/dashboard" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="<?= base_url() ?>relawan/profile" class="menu-link">
                            <i class='menu-icon tf-icons bx bx-user'></i>
                            <div data-i18n="Analytics">Profile</div>
                        </a>
                    </li>

                    <!-- E-Event -->
                    <!-- <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-chalkboard"></i>
                            <div data-i18n="E-Event">E-Event</div>
                        </a>

                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="<?= base_url() ?>relawan/event/event" class="menu-link">
                                    <div data-i18n="Event">Event</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>relawan/event/pengajuan" class="menu-link">
                                    <div data-i18n="Pengajuan">Pengajuan</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>relawan/event/sertifikat" class="menu-link">
                                    <div data-i18n="Sertifikat">Sertifikat</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="<?= base_url() ?>relawan/event/history" class="menu-link">
                                    <div data-i18n="History">History</div>
                                </a>
                            </li>
                        </ul>
                    </li> -->
                </ul>
            <?php endif ?>
        </aside>