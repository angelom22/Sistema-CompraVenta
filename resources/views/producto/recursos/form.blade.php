<div class="form-group row">
    <label class="col-md-3 form-control-label" for="titulo">Categoría</label>
    <div class="col-md-9">
        <select class="form-control" name="id" id="id" required>
            <option value="0" disabled>Seleccione</option>
            @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
            @endforeach
        </select>   
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="codigo">Código</label>
    <div class="col-md-9">
        <input type="number" name="codigo" id="codigo" class="form-control" placeholder="Ingrese el Código" required pattern="[0-9]{0,20}">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="stock">Stock</label>
    <div class="col-md-9">
        <input type="text" name="stock" id="stock" class="form-control" placeholder="Ingrese el stock" disabled>
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="nombre">Nombre</label>
    <div class="col-md-9">
    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre" required pattern="^[a-zA-Z_áéíóúñ\s]{0,50}$">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="medida">Medición</label>
    <div class="col-md-9">
        <select class="form-control" name="medida" id="medida" required>
            <option value="0" disabled>Seleccione</option>
            @foreach($unidades as $unidad)
                <option value="{{$unidad->id}}">{{$unidad->nombre}}</option>
            @endforeach
        </select>   
    </div>
</div>


<!-- <div class="form-group row" id="div_cantidad" style="display:none;">
    <label class="col-md-3 form-control-label" for="cantidad">Cantidad</label>
    <div class="col-md-4">
        <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Ingrese la cantidad" required pattern="[0-9]{0,1000}">
    </div>
</div> -->

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="precio_venta">Precio Venta</label>
    <div class="col-md-9">
        <input type="number" name="precio_venta" id="precio_venta" class="form-control" placeholder="Ingrese el precio de venta" required pattern="[0-9]{0,100}">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="precio_costo">Precio Costo</label>
    <div class="col-md-9">
        <input type="number" name="precio_costo" id="precio_costo" class="form-control" placeholder="Ingrese el precio de costo" required pattern="[0-9]{0,100}">
    </div>
</div>

<div class="form-group row">
    <label class="col-md-3 form-control-label" for="imagen">Imagen</label>
    <div class="col-md-9">
    <input type="file" name="imagen" id="imagen" class="form-control" >
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i> Cerrar</button>
    <button type="submit" class="btn btn-success"><i class="fa fa-save fa-2x"></i> Guardar</button>
</div>