<div class="form-group form-float">
    <div class="col-6 mx-auto">
        <label class="form-label">Libelle type</label>
        <input type="text" class="form-control" name="libelle" 
            value="{{ old('libelle', $type->libelle ?? null) }}">
    </div>
</div>