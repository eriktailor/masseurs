<div class="modal fade" id="masseurModal" tabindex="-1" aria-labelledby="masseurModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-between">
                <h4 class="modal-title fs-4" id="masseurModalLabel">
                    <span id="masseurShortName">Masszőr</span> szerkesztése
                </h4>
                <button class="btn p-0" type="button" data-bs-dismiss="modal" aria-label="Bezár">
                    <x-icon name="x" width="24" height="24" class="opacity-50" strokeWidth="1.5"/>
                </button>
            </div>
            <div class="modal-body position-relative py-0">
                <x-loading/>
                <form id="masseurForm" action="{{ route('masseur.store') }}" method="POST">
                    @csrf
                    <input id="masseurName" name="name" type="hidden" required>
                    <div class="d-flex align-items-center gap-4 mb-4">
                        <div>
                            <label class="form-label" for="masseurProfileImage">Profilkép</label>
                            <p class="small opacity-75 text-muted mb-0 me-4">Az ide feltöltött profilkép fog megjelenni a foglalási rendszerben a lány neve mellett. Kattints a képre egy új kép feltöltéshez!</p>
                        </div>
                        <div class="rounded-circle position-relative overflow-hidden d-flex align-items-center justify-content-center flex-none">
                            <img class="object-fit-cover" id="masseurProfileImage" src="{{ asset('img/noimage.png') }}" width="100" height="100" alt="Profile Image">
                            <div class="position-absolute bg-primary bg-opacity-75 w-100 h-100 d-flex align-items-center justify-content-center hover-opacity-100" type="button" id="masseurProfileImageHover">
                                <x-icon class="text-white" name="link" width="30" height="30"/>
                            </div>
                            <input class="d-none" id="masseurProfileImageHidden" name="avatar" type="file" accept="image/*">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="masseurFullName">Teljes neve</label>
                        <input class="form-control" id="masseurFullName" name="full_name" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="masseurMotherName">Anyja neve</label>
                        <input class="form-control" id="masseurMotherName" name="mother_name" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="masseurBirthDate">Születési ideje</label>
                        <input class="form-control date-input" id="masseurBirthDate" name="birth_date" type="text" placeholder="ÉÉÉÉ-HH-NN">
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
                        <input class="form-control date-input" id="masseurVisaExpire" name="visa_expire" type="text" placeholder="ÉÉÉÉ-HH-NN">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="masseurPassportNumber">Útlevél száma</label>
                        <input class="form-control" id="masseurPassportNumber" name="passport_number" type="text">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="masseurPassportExpire">Útlevél lejárata</label>
                        <input class="form-control date-input" id="masseurPassportExpire" name="passport_expire" type="text" placeholder="ÉÉÉÉ-HH-NN">
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="masseurIntroduction">
                            Bemutatkozás
                        </label>
                        <p class="small opacity-75 text-muted">Ez az a leírás, ami a honlapon a masszőr neve alatt szerepel. Ha ezt megváltoztatod, nem változik meg automatikusan a honlapon.</p>
                        <textarea class="form-control" id="masseurIntroduction" name="introduction" rows="6"></textarea>
                    </div>
                    <div>
                        <label class="form-label" for="masseurOtherNotes">
                            Egyéb infó, megjegyzés
                        </label>
                        <p class="small opacity-75 text-muted">Ez sehol nem jelenik majd meg ezen a felületen kívül, ide bárki írhat ide bármi infót a lányról.</p>
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