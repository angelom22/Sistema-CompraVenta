<div class="form-group row">
    <label class="col-md-3 form-control-label" for="nombre">Nombre Cliente <span style="color:red;">(*)</span></label>
    <div class="col-md-9">
         <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre de la empresa" required pattern="^[a-zA-Z_áéíóúñ\s]{0,50}$">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="tipo_documento">Tipo Documento <span style="color:red;">(*)</span></label>
    <div class="col-md-9">
    <select class="form-control" name="tipo_documento" id="tipo_documento" required>
            <option value="0" disabled>Seleccione</option>
            @foreach($tipo_documento as $letra)
                <option value="{{$letra->id}}">{{$letra->letra_documento}}</option>
            @endforeach
        </select> 
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="num_documento">Numero Documento <span style="color:red;">(*)</span></label>
    <div class="col-md-9">
    <input type="number" name="num_documento" id="num_documento" class="form-control" placeholder="Ingrese el numero de documento" required pattern="[0-9\-]{0,15}">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="direccion">Dirección</label>
    <div class="col-md-9">
        <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingrese la Dirección"  pattern="^[a-zA-Z0-9_áéíóúñº,.\s]{0,200}$">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="telefono">Telefono</label>
    <div class="col-md-9">
        <input type="number" name="telefono" id="telefono" class="form-control" placeholder="Ingrese el telefono"  pattern="[0-9]{0,15}">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="email">Correo</label>
    <div class="col-md-9">
        <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese el correo" >
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
</div>