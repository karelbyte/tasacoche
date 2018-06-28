<div class="container">
    <div id="app">
        <form-wizard @on-complete="onComplete"
                     title=""
                     subtitle=""
                     shape="tab"
                     back-button-text="Atras"
                     next-button-text="Obtener Tasación"
                     finish-button-text="We're there"
                     color="rgba(17, 31, 41, 1)">
            <tab-content icon="ti-layout-accordion-list" :before-change="()=>validateStep('step1')">
                <p> Obtenga la tasación de su vehículo de forma rápida, sencilla y gratuita, siguiendo los pasos descritos a continuación, no le llevara mas de 2 minutos.
                </p>
                <p class="text-justify"> No te dejes engañar por plataformas con tasaciones sobrevaloradas. Después te devaluarán hasta el 40%. Esta plataforma te ofrece la tasación más real y sincera. Solo devaluaremos por el estado de tu vehículo (pintura, averías). Somos profesionales.
                </p>

                <div class="row" style="margin-top: 20px">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Marca</label>
                            <v-select label="nombre" v-model="marca" :options="marcas"></v-select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Modelos</label>
                            <v-select label="nombre" v-model="modelo" :options="modelos"></v-select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Combustible</label>
                            <v-select label="nombre" v-model="combustible" :options="combustibles"></v-select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Matriculacion</label>
                            <v-select label="nombre" v-model="matricula" :options="matriculas"></v-select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Versión</label>
                            <v-select label="version" v-model="version" :options="versiones"></v-select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Kilometraje</label>
                            <v-select label="nombre" v-model="km" :options="kms"></v-select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="control-label">Email</label>
                            <input type="text" class="form-control" v-model="email">
                        </div>
                    </div>
                </div>
            </tab-content>
            <tab-content title="Additional Info"
                         icon="ti-settings">
                My second tab content
            </tab-content>
            <tab-content title="Last step"
                         icon="ti-check">
                Yuhuuu! This seems pretty damn simple
            </tab-content>
        </form-wizard>
    </div>
</div>