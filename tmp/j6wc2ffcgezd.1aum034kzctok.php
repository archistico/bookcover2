<div class="row">
    <div class="col-md-12">
        <form method="GET" action="/pdf">

            <h5>Pagina</h5>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="larghezza">Larghezza [mm]</label>
                        <input type="number" min="0" class="form-control" id="larghezza" placeholder="Scrivi la larghezza della pagina in mm" value="150" name="larghezza" required>
                    </div> 
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="altezza">Altezza [mm]</label>
                        <input type="number" min="0" class="form-control" id="altezza" placeholder="Scrivi l'altezza della pagina in mm" value="210" name="altezza" required>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="alette">Alette [mm]</label>
                        <input type="number" min="0" class="form-control" id="alette" placeholder="Se ci sono le alette indicare la larghezza" value="0" name="alette" required>
                    </div> 
                </div>
            </div>

            <h5>Indicazioni tipografiche</h5>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="abbondanza">Abbondanza [mm]</label>
                        <input type="number" min="0" class="form-control" id="abbondanza" placeholder="Millimetri oltre la linea di taglio di sicurezza" value="5" name="abbondanza" required>
                    </div> 
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="segnitaglio">Segni di taglio [mm]</label>
                        <input type="number" min="0" class="form-control" id="segnitaglio" placeholder="Lunghezza dei segni di taglio" value="3" name="segnitaglio" required>
                    </div> 
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="bordo">Bordo sicurezza interno [mm]</label>
                        <input type="number" min="0" class="form-control" id="bordo" placeholder="Bordo interno per i testi" value="3" name="bordo" required>
                    </div> 
                </div>
            </div>

            <h5>Dorso</h5>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="numeropagine">Numero di pagine [-]</label>
                        <input type="number" min="0" class="form-control" id="numeropagine" placeholder="Indica il numero di pagine" value="160" name="numeropagine" autofocus required>
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
                            <option value="0" selected>Fresata</option>
                            <option value="1">Cucita</option>
                        </select>
                    </div> 
                </div>
            </div>

            <h5>Parametri testuali</h5>

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input type="text" class="form-control" placeholder="Segna l'ISBN" name="isbn" id="isbn" value="9788897192602">
                    </div> 
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="titolo">Titolo</label>
                        <input type="text" class="form-control" placeholder="Titolo" name="titolo" id="titolo" value="Titolo">
                    </div> 
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block">CREA COPERTINA</button>            
        </form>
    </div>
</div>