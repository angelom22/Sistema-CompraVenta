<div class="form-group row">
    <p style="font-size:15px;"><strong>Campos obligatorios</strong></p><span style="color:red;">(*)</span>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="nombre">Nombre <span style="color:red;">(*)</span></label>
    <div class="col-md-9">
         <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,50}$">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="num_documento">Número Documento <span style="color:red;">(*)</span></label>
    
    <div class="col-md-2">
        <select class="form-control" name="tipo_documento" id="tipo_documento">
            <option value="0" disabled>Seleccione</option>
            @foreach($tipo_documento as $letra)
                <option value="{{$letra->id}}">{{$letra->letra_documento}}</option>
            @endforeach
        </select> 
    </div>
    <div class="col-md-7">
        <input type="number" name="num_documento" id="num_documento" class="form-control" placeholder="Ingrese el número de documento" required pattern="[0-9\-]{0,15}">
    </div>

</div>


<div class="form-group row">
    <label class="col-md-3 form-control-label" for="direccion">Dirección</label>
    <div class="col-md-9">
        <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Ingrese la Dirección"  pattern="^[a-zA-Z0-9_áéíóúñ,.\s]{0,200}$">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="telefono">Telefono</label>
    <div class="col-md-9">
        <input type="tel" name="telefono" id="telefono" class="form-control" placeholder="Ingrese el telefono"  pattern="[0-9]{0,15}">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="email">Correo</label>
    <div class="col-md-9">
        <input type="email" name="email" id="email" class="form-control" placeholder="Ingrese el correo" >
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="usuario">Usuario <span style="color:red;">(*)</span></label>
    <div class="col-md-9">
        <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese el nombre del usuario" required pattern="^[a-zA-Z_áéíóúñ\s]{0,30}$" >
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="id_roles">Rol <span style="color:red;">(*)</span></label>
    <div class="col-md-9">
        <select style="width: 565px;" class="form-control select2" name="id_roles[]" id="id_roles" multiple required>
            <option value="0" disabled>Seleccione</option>
            @foreach($roles as $rol)
                <option value="{{$rol->id}}">{{$rol->nombre}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="password">Password <span style="color:red;">(*)</span></label>
    <div class="col-md-9">
        <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese la contraseña" required >
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="imagen">Imagen</label>
    <div class="col-md-9">
    <input type="file" name="imagen" id="imagen" class="form-control" >
    </div>
</div>

<div class="modal-footer">
    <!-- <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i></button> -->
    <input type="submit" class="btn btn-success" value="{{ $btnText ?? 'Guardar'}}">
    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cerrar">
</div>