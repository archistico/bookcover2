<div class="row">
    <div class="col-md-12">
        <form>

            <h5>Pagina</h5>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="larghezza">Larghezza [mm]</label>
                        <input type="number" min="0" class="form-control" id="larghezza" placeholder="Scrivi la larghezza della pagina in mm" value="150" name="larghezza">
                    </div> 
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="altezza">Altezza [mm]</label>
                        <input type="number" min="0" class="form-control" id="altezza" placeholder="Scrivi l'altezza della pagina in mm" value="210" name="altezza">
                    </div> 
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="alette">Alette [mm]</label>
                        <input type="number" min="0" class="form-control" id="alette" placeholder="Se ci sono le alette indicare la larghezza" value="0" name="alette">
                    </div> 
                </div>
            </div>

            <h5>Indicazioni tipografiche</h5>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="abbondanza">Abbondanza [mm]</label>
                        <input type="number" min="0" class="form-control" id="abbondanza" placeholder="" value="5" name="abbondanza">
                    </div> 
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="segnitaglio">Segni di taglio [mm]</label>
                        <input type="number" min="0" class="form-control" id="segnitaglio" placeholder="" value="3" name="segnitaglio">
                    </div> 
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="bordo">Bordo sicurezza interno [mm]</label>
                        <input type="number" min="0" class="form-control" id="bordo" placeholder="" value="3" name="bordo">
                    </div> 
                </div>
            </div>

            <h5>Dorso</h5>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="numeropagine">Numero di pagine [-]</label>
                        <input type="number" min="0" class="form-control" id="numeropagine" placeholder="" value="80" name="numeropagine">
                    </div> 
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="grammatura">Grammatura carta [g/m2]</label>
                        <select class="form-control" id="grammatura" name="grammatura">
                            <option value="85">85</option>
                            <option value="100" selected>100</option>
                            <option value="120">120</option>
                        </select>
                    </div> 
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="rilegatura">Rilegatura [-]</label>
                        <select class="form-control" id="rilegatura" name="rilegatura">
                            <option selected>Fresata</option>
                            <option>Cucita</option>
                        </select>
                    </div> 
                </div>
            </div>

            <h5>Parametri opzionali</h5>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Casa editrice</label>
                        <input type="text" class="form-control" placeholder="" name="" id="">
                    </div> 
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Collana</label>
                        <input type="text" class="form-control" placeholder="" name="" id="">
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">Titolo</label>
                        <input type="text" class="form-control" placeholder="" name="" id="">
                    </div> 
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="">ISBN</label>
                        <input type="text" class="form-control" placeholder="" name="" id="">
                    </div> 
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="">Prezzo</label>
                        <input type="text" class="form-control" placeholder="" name="" id="">
                    </div> 
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">CREA COPERTINA</button>            
        </form>
    </div>
</div>