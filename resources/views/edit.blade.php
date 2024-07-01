<div class="modal fade" id="masseurModal" tabindex="-1" aria-labelledby="masseurModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="masseurModalLabel">
                    <span id="masseurShortName"></span> szerkesztése
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-0">
                <div class="d-flex align-items-center gap-4 mb-3">
                    <div>
                        <img class="rounded-circle overflow-hidden object-fit-cover" id="masseurProfileImage" src="{{ asset('img/noimage.png') }}" width="100" height="100">
                        <input class="form-control" id="masseurProfileImageHidden" type="hidden">
                    </div>
                    <div>
                        <button class="btn btn-secondary">Profilkép feltöltése</button>
                        <p class="small opacity-75 mt-3 mb-0">Az ide feltöltött profilkép fog megjelenni a foglalási rendszerben a lány neve mellett.</p>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="masseurMotherName">Anyja neve</label>
                    <input class="form-control" id="masseurMotherName" type="text">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="masseurBirthDate">Születési ideje</label>
                    <input class="form-control datepicker" id="masseurBirthDate" type="text">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="masseurBirthPlace">Születési helye</label>
                    <input class="form-control" id="masseurBirthPlace" type="text">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="masseurVisaNumber">Visa száma</label>
                    <input class="form-control" id="masseurVisaNumber" type="text">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="masseurVisaExpire">Visa lejárata</label>
                    <input class="form-control datepicker" id="masseurVisaExpire" type="text">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="masseurPassportNumber">Útlevél száma</label>
                    <input class="form-control" id="masseurPassportNumber" type="text">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="masseurPassportExpire">Útlevél lejárata</label>
                    <input class="form-control datepicker" id="masseurPassportExpire" type="text">
                </div>
                <div>
                    <label class="form-label" for="masseurOtherNotes">Egyéb infó, megjegyzés</label>
                    <textarea class="form-control" id="masseurOtherNotes" rows="6"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Mégsem</button>
                <button class="btn btn-primary" type="button">Mentés</button>
            </div>
        </div>
    </div>
</div>