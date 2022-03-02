@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <form action="/mahasiswa/{{auth()->user()->id}}/postPemRutin" method="POST">
                {{csrf_field()}}
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Apakah Anda Mengalami Gejala Berikut?</h3>
                            </div>
                            <div class="panel-body">
                                    <!-- KESEHATAN -->
                                        <!-- DEMAM -->
                                        <div class="form-group{{$errors->has('demam') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label class="form-label">Demam</label>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="demam" value="ya">
                                                        <label class="form-check-label">Ya</label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="demam" value="tidak">
                                                        <label class="form-check-label">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($errors->has('demam'))
                                                <span class="help-block text-danger">{{$errors->first('demam')}}</span>
                                            @endif
                                        </div>

                                        <!-- BATUK -->
                                        <div class="form-group{{$errors->has('batuk') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label class="form-label">Batuk</label>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="batuk" value="ya">
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="batuk" value="tidak">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($errors->has('batuk'))
                                                    <span class="help-block text-danger">{{$errors->first('batuk')}}</span>
                                                @endif
                                            </div>

                                        <!-- LEMAS -->
                                        <div class="form-group{{$errors->has('lemas') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label class="form-label">Badan Lemas</label>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="lemas" value="ya">
                                                            <label class="form-check-label" >Ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="lemas" value="tidak">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($errors->has('lemas'))
                                                    <span class="help-block text-danger">{{$errors->first('lemas')}}</span>
                                                @endif
                                            </div>

                                        <!-- SAKIT KEPALA -->
                                        <div class="form-group{{$errors->has('sakit_kepala') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label class="form-label">Sakit Kepala</label>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sakit_kepala" value="ya">
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sakit_kepala" value="tidak">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($errors->has('sakit_kepala'))
                                                    <span class="help-block text-danger">{{$errors->first('sakit_kepala')}}</span>
                                                @endif
                                            </div>

                                        <!-- NYERI OTOT -->
                                        <div class="form-group{{$errors->has('pegal') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label class="form-label">Nyeri Pada Otot atau Pegal - Pegal</label>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pegal" value="ya">
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="pegal" value="tidak">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($errors->has('pegal'))
                                                    <span class="help-block text-danger">{{$errors->first('pegal')}}</span>
                                                @endif
                                            </div>

                                        <!-- SAKIT TENGGOROKAN -->
                                        <div class="form-group{{$errors->has('sakit_tenggorokan') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                                <div class="row">
                                                    <div class="col-xs-6">
                                                        <label class="form-label">Sakit atau Nyeri Pada Tenggorokan</label>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sakit_tenggorokan" value="ya">
                                                            <label class="form-check-label">Ya</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sakit_tenggorokan" value="tidak">
                                                            <label class="form-check-label">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if($errors->has('sakit_tenggorokan'))
                                                    <span class="help-block text-danger">{{$errors->first('sakit_tenggorokan')}}</span>
                                                @endif
                                            </div>
                                        
                                        <!-- SESAK NAFAS -->
                                        <div class="form-group{{$errors->has('sesak_nafas') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label class="form-label">Kesulitan Bernafas atau Sesak Nafas</label>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="sesak_nafas" value="ya">
                                                        <label class="form-check-label">Ya</label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="sesak_nafas" value="tidak">
                                                        <label class="form-check-label">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($errors->has('sesak_nafas'))
                                                    <span class="help-block text-danger">{{$errors->first('sesak_nafas')}}</span>
                                            @endif
                                        </div>

                                        <!-- ANOSMIA -->
                                        <div class="form-group{{$errors->has('anosmia') ? 'has-error' : ' ' }}" style="margin-bottom: 20px;">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label class="form-label">Kehilangan Penciuman (Anosmia)</label>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="anosmia" value="ya">
                                                        <label class="form-check-label">Ya</label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="anosmia" value="tidak">
                                                        <label class="form-check-label">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($errors->has('anosmia'))
                                                    <span class="help-block text-danger">{{$errors->first('anosmia')}}</span>
                                            @endif
                                        </div>

                                        <!-- AGEUSIA -->
                                        <div class="form-group{{$errors->has('ageusia') ? 'has-error' : ' ' }}" style="margin-bottom: 60px;">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label class="form-label">Kehilangan Pengecapan Rasa (Ageusia)</label>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ageusia" value="ya">
                                                        <label class="form-check-label">Ya</label>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ageusia" value="tidak">
                                                        <label class="form-check-label">Tidak</label>
                                                    </div>
                                                </div>
                                            </div>
                                            @if($errors->has('ageusia'))
                                                <span class="help-block text-danger">{{$errors->first('ageusia')}}</span>
                                            @endif
                                        </div>

                                        <!-- KONTAK -->
                                        <div class="form-group{{$errors->has('kontak') ? 'has-error' : ' ' }}">
                                            <div class="row">
                                                <div class="col-xs-6">
                                                    <label class="form-label">Apakah anda pernah melakukan kontak dengan kasus terkonfirmasi COVID - 19?</label>
                                                </div>
                                                <div class="col-xs-2">
                                                    <input class="form-check-input" type="radio" name="kontak" value="pernah">
                                                    <label class="form-check-label"> Pernah</label>
                                                </div>
                                                <div class="col-xs-2">
                                                    <input class="form-check-input" type="radio" name="kontak" value="tidak pernah">
                                                    <label class="form-check-label"> Tidak Pernah</label>
                                                </div>
                                                <div class="col-xs-2">
                                                    <input class="form-check-input" type="radio" name="kontak" value="tidak yakin">
                                                    <label class="form-check-label"> Tidak Yakin</label>
                                                </div>
                                            </div>
                                            @if($errors->has('kontak'))
                                                <span class="help-block text-danger">{{$errors->first('kontak')}}</span>
                                            @endif
                                        </div>
                            </div>        
                        </div>                
                    </div>
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="">Rencana Masuk Kampus</h3>
                            </div>
                            <div class="panel-body">

                                <div class="form-group{{$errors->has('masuk_kampus') ? 'has-error' : ' ' }}">
                                    <label for="masuk_kampus">Apakah anda akan masuk kampus hari ini?</label>
                                    <select class="form-control" name="masuk_kampus" id="masuk_kampus">
                                        <option value="tidak">Tidak</option>
                                        <option value="ya">Ya</option>
                                    </select>
                                    @if($errors->has('masuk_kampus'))
                                        <span class="help-block text-danger">{{$errors->first('masuk_kampus')}}</span>
                                    @endif
                                </div>
                                
                                <div class="form-grup">
                                    <table class="table" id="dynamicAddRemove">
                                        <tr>
                                            <td>
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <label>Waktu</label>
                                                        <select class="form-control" name="waktu[0]">
                                                            <option value="7">7.00</option>
                                                            <option value="8">8.00</option>
                                                            <option value="9">9.00</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <label>Gedung</label>
                                                        <select class="form-control" name="gedung[0]">
                                                            <option value="1">Gedung 1</option>
                                                            <option value="2">Gedung 2</option>
                                                            <option value="3">Gedung 3</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <label>Ruang</label>
                                                        <select class="form-control" name="ruang[0]">
                                                            <option value="1">Ruang 1</option>
                                                            <option value="2">Ruang 2</option>
                                                            <option value="3">Ruang 3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Tambah Lokasi</button></td>
                                        </tr>
                                    </table>
                                </div>


<!--
                                <div class="form-group" id="lokasiGanesa">
                                    <label >Lokasi Aktivitas di Kampus Ganesa</label>
                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>101 - Kantor FTSL</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>102 - Kantor FSRD</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>103 - Kantor Satpam</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>104 - Pos Satpam</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>105 - Aula Barat</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>106 - Aula Timur</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>107 - Teknik Sipil 1</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>108 - Gallery Sumardja</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>109 - PSDA</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>110 - LFM</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>111 - Ruang Tenant</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>112 - Kantin Timur Laut</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>113 - BSC A</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>114 - Labtek IX B</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>115 - Gedung Bundar</span>
					                </label>
                                    
                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>116 - Kios Parkir Timur</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>118 - Labtek IX C</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>119 - Gedung Fisika</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>120 - Labtek IX A</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>121 - Campus Center Barat</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>122 - Campus Center Timur</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>123 - Campus Center Tengah (Information Center)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>124 - Teknik Lingkungan</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>125 - Lab Konversi (STEI)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>126 - Kriya 1 (FSRD)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>127 - Bunker (Lab Meteorologi Industri)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>128 - Kriya 2 (FSRD)</span>
					                </label>
                                    
                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>129 - Lab Radar (STEI)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>130 - Dit. SP</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>131 - GKU Barat</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>132 - Gedung Geodesi Program Magister</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>133 - Labtek V</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>134 - GKU Timur</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>135 - Labtek VI</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>136 - Labtek VIII</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>137 - Labtek II</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>138 - Labtek VII</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>139 - Lab Mesin 1 (Baru)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>140 - Lab Hidrolika (FTSL)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>141 - Lab Mesin 2 (Lama)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>142 - Kantin Bengkok</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>143 - Labtek XI</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>144 - Gedung Kimia Lama</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>145 - Gedung TVST</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>146 - Labtek 1</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>147 - Oktagon</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>148 - Gedung Kerjasama PLN</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>149 - Labtek X</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>150 - Lab Komputer</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>151 - Lab Surya</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>152 - Gedung Kimia</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>153 - Labtek III Selatan Matthias Aroef</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>154 - Basic Science B</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>155 - Labtek III Utara Matthias Aroef</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>156 - Labtek IV Selatan</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>157 - Laboratorium Teknologi XX</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>158 - Labtek IV Utara</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>159 - Bangunan Ex.Gardu</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>160 - Gedung Perpustakaan</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>161 - Gedung PAU</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>162 - Pool Kendaraan</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>163 - SBM</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>165 - Sunken Court</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>166 - Gedung LAPI/BRI</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>168 - Kantin Saraga</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>169 - Bangunan Ex.MKOR</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>170 - Menara Air</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>171 - Kios Taman SBM</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>172 - Lab Doping</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>173 - Laboratorium Teknologi XVI (CRCS)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>174 - Laboratorium Teknologi XV (CAS)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>175 - Laboratorium Teknologi XIV (CADL)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>176 - Laboratorium Teknologi XIII (CIBE)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>177 - Laboratorium Teknologi XVIII (R&M EM)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>178 - Laboratorium Teknologi XVII (PPTI Kereta Api)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>179 - Laboratorium Teknologi XVII (PPTI Mesin Perkakas)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>180 - Laboratorium Teknologi XVII (PPTI Alat Kesehatan)</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>181 - Laboratorium Teknologi XIX (SBM-PT Freeport Indonesia)</span>
					                </label>
                                </div>

                                <div class="form-group" id="lokasiJatinangor">
                                    <label >Lokasi Aktivitas di Kampus Jatinangor</label>
                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>201 - Gedung Utama</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>202 - Gedung A</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>203 - Gedung B</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>204 - Gedung C</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>205 - Gedung D</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>206 - Gedung E</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>207 - Gedung Perpustakaan Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>208 - Labtek V A Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>209 - Labtek V B Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>210 - Labtek V C Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>211 - Green House Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>212 - Labtek II A Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>213 - Mesjid Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>214 - Mess Himpunan Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>215 - Labtek II B Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>216 - Gedung Serbaguna Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>217 - GKU 2 Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>218 - Labtek 1A Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>219 - Labtek 1B Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>220 - GKU 1 Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>221 - Pool Kendaraan Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>222 - Gedung IPST Jatinnagor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>223 - Labtek 1C Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>224 - Gedung WTP</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>225 - Gedung H Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>226 - Gedung K Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>906 Gd. Direktorat Kampus UNWIM</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>707 - Asrama ITB Jatinangor TB 1</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>908 - Asrama ITB Jatinangor TB 2</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>909 - Asrama ITB Jatinangor TB3</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>910 - Asrama ITB Jatinangor TB4</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>911 - Asrama ITB Jatinangor TB5</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>915 - Rumah Susun Dosen Jatinangor</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>919 - Gedung KOICA</span>
					                </label>
                                </div>

                                <div class="form-group" id="lokasiCCAR">
                                    <label >Lokasi Aktivitas di CCAR</label>
                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>901 - Gedung Rektor 01</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>902 - CCAR 02</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>903 - Annex 03</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>904 - Masjid 04</span>
					                </label>

                                    <label class="fancy-checkbox">
						                <input type="checkbox">
						                <span>905 - SPM + SPI 05</span>
					                </label>
                                </div>
-->
                                <div class="modal-footer">
                                    @if($d == $dateNow and $m == $monthNow and $y = $yearNow)
                                        <button type="submit" class="btn btn-success">Kirim</button>
                                    @endif
                                </div>
                            </div>        
                        </div>                
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection