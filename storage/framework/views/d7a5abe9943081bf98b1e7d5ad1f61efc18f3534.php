<div class="text-center">
    <h3 class="title text-primary">Observador del alumno</h3>
</div>
<div class="row">
    <div class="col-4">
        <section class="card">
            <header class="card-header bg-transparent">
                <h2 class="card-title">Información básica</h2>
            </header>
            <div class="card-content">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Estudiante: </strong><spang><?php echo e($estudiante->full_name); ?></spang></li>
                    <li class="list-group-item"><strong>Identificación: </strong><span><?php echo e($estudiante->full_identidad); ?></span></li>
                    <li class="list-group-item"><strong>Lugar de nacimiento: </strong><span><?php echo e($estudiante->nac); ?></span></li>
                    <li class="list-group-item"><strong>Edad: </strong><span><?php echo e($estudiante->edad); ?></span></li>
                </ul>
            </div>
        </section>
    </div>
    <div class="col-4">
        <section class="card">
            <header class="card-header bg-transparent">
                <h2 class="card-title">Información de contacto</h2>
            </header>
            <div class="card-content">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Dirección: </strong><spang><?php echo e($estudiante->address); ?></spang></li>
                    <li class="list-group-item"><strong>Tel.: </strong><span><?php echo e($estudiante->phone); ?></span></li>
                    <li class="list-group-item"><strong>EPS: </strong><span><?php echo e($estudiante->EPS); ?></span></li>
                </ul>
            </div>
        </section>
    </div>
    <div class="col-4">
        <section class="card">
            <header class="card-header bg-transparent">
                <h2 class="card-title">Información de academica</h2>
            </header>
            <div class="card-content">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Ingreso: </strong><spang><?php echo e($estudiante->datein); ?></spang></li>
                    <li class="list-group-item"><strong>Situación Ac.: </strong><span><?php echo e($estudiante->situation); ?></span></li>
                    <li class="list-group-item"><strong>Grado: </strong><span><?php echo e($estudiante->grupo->grado->numero); ?>°</span></li>
                </ul>
            </div>
        </section>
    </div>
    
        
            
                
                    
                        
                    
                    
                        
                            
                        
                        
                            
                            
                        
                    
                
                
                    
                        
                    
                    
                        
                            
                            
                        
                    
                
            
        
    
</div>