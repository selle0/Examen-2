<div>
    <div class="form-group">
        <label for="usr">Nombre:</label>
        <input wire:model="data.nombre" type="text" class="form-control" id="usr">
      </div>
      <div class="form-group">
        <label for="">Carrera:</label>
        <input wire:model="data.carrera" type="text" class="form-control" id="pwd">
      </div>
      <div class="form-group">
        <label for="pwd">Edad:</label>
        <input wire:model="data.edad" type="text" class="form-control" id="pwd">
      </div>
      <div class="form-group">
        <label for="pwd">Genero:</label>
        <select wire:model="data.genero" class="form-control">
            <option value=""></option>
            <option>Masculino</option>
            <option>Femenino</option>
        </select>
      </div>
      <div class="form-group">
        <label for="pwd">Ednia Indigena:</label>
        <select wire:model="data.ednia_indigena" class="form-control">
            <option value=""></option>
            <option>Si</option>
            <option>No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="pwd">Horario:</label>
        <select wire:model="data.horario" class="form-control">
            <option value=""></option>
            <option>Matutino</option>
            <option>Vespertino</option>
        </select>
      </div>
      <div class="form-group">
        <label for="pwd">Calificacion Preparatoria:</label>
        <select wire:model="data.calificacion_prepa" class="form-control">
            <option value=""></option>
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
        </select>
      </div>
      <div class="form-group">
        <label for="pwd">Becado:</label>
        <select wire:model="data.becado" class="form-control">
            <option value=""></option>
            <option>Si</option>
            <option>No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="pwd">Problemas de salud:</label>
        <select wire:model="data.problemas_de_salud" class="form-control">
            <option value=""></option>
            <option>Si</option>
            <option>No</option>
        </select>
      </div>
      <br>
      <button wire:click="guardardatos" type="button" class="btn btn-primary">GUARDAR DATOS</button>
</div>
