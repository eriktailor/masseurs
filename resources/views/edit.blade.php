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
                <form id="storeMasseurForm" action="{{ route('masseur.store') }}" method="POST">
                    @csrf
                    <input id="masseurName" name="name" type="text" required>
                    <div class="d-flex align-items-center gap-4 mb-4">
                        <div>
                            <img class="rounded-circle overflow-hidden object-fit-cover" id="masseurProfileImage" src="{{ asset('img/noimage.png') }}" width="100" height="100">
                            <input class="form-control" id="masseurProfileImageHidden" name="avatar" type="hidden">
                        </div>
                        <div>
                            <button class="btn btn-secondary">Profilkép feltöltése</button>
                            <p class="small opacity-75 mt-3 mb-0">Az ide feltöltött profilkép fog megjelenni a foglalási rendszerben a lány neve mellett.</p>
                        </div>
                    </div>
                    <!-- <div class="mb-3">
                        <label class="form-label" for="masseurFullName">Teljes név</label>
                        <input class="form-control" id="masseurFullName" name="masseur_full_name" type="text">
                    </div> -->
                    <div class="mb-3">
                        <label class="form-label" for="masseurMotherName">Anyja neve</label>
                        <input class="form-control" id="masseurMotherName" name="mother_name" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="masseurBirthDate">Születési ideje</label>
                        <input class="form-control datepicker" id="masseurBirthDate" name="birth_date" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="masseurBirthPlace">Születési helye</label>
                        <input class="form-control" id="masseurBirthPlace" name="birth_place" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="masseurVisaNumber">Visa száma</label>
                        <input class="form-control" id="masseurVisaNumber" name="visa_number" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="masseurVisaExpire">Visa lejárata</label>
                        <input class="form-control datepicker" id="masseurVisaExpire" name="visa_expire" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="masseurPassportNumber">Útlevél száma</label>
                        <input class="form-control" id="masseurPassportNumber" name="passport_number" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="masseurPassportExpire">Útlevél lejárata</label>
                        <input class="form-control datepicker" id="masseurPassportExpire" name="passport_expire" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="masseurIntroduction">
                            Bemutatkozás
                            <span data-bs-toggle="tooltip" title="Ez a honlapon fog megjelenni">
                                <x-icon class="opacity-50" name="info-circle" width="20" height="20" strokeWidth="2"/>
                            </span>
                        </label>
                        <textarea class="form-control" id="masseurIntroduction" name="introduction" rows="6"></textarea>
                    </div>
                    <div>
                        <label class="form-label" for="masseurOtherNotes">
                            Egyéb infó, megjegyzés
                            <span data-bs-toggle="tooltip" title="Ez sehol nem jelenik majd meg, bárki írhat ide bármit">
                                <x-icon class="opacity-50" name="info-circle" width="20" height="20" strokeWidth="2"/>
                            </span>
                        </label>
                        <textarea class="form-control" id="masseurOtherNotes" name="notes" rows="6"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Mégsem</button>
                <button class="btn btn-primary" id="storeMasseurButton" type="button">Mentés</button>
            </div>
        </div>
    </div>
</div>