 {{-- here we can check if logged user is the one with the profile then, if yes
    give access to edit otherwise just show a profile only.

    this approach seems to have an issue let's sort it out in this way.. --}}
       <div class="row">
        <div class="col-xl-4">
          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img height="100px" width="100px" class="rounded-circle" src="{{ asset('storage/images/'.$user_data->image) }}" alt="profile image">
              {{-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> --}}
              <h2>{{$user_data->name ?? ''}}</h2>
              <h4 class="text-muted">{{$user_data->job}}</h4>
              <div class="social-links mt-2">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Aperçu</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Modifier le profil</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Paramètres</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Changer le mot de passe</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">À propos</h5>
                  <p class="small fst-italic">{{$user_data->about ?? ''}}</p>

                  <h5 class="card-title">Détails du profil</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nom et prénom</div>
                    <div class="col-lg-9 col-md-8">{{$user_data->name ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Entreprise</div>
                    <div class="col-lg-9 col-md-8">{{$user_data->company ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Emplois</div>
                    <div class="col-lg-9 col-md-8">{{$user_data->job ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Pays</div>
                    <div class="col-lg-9 col-md-8">{{$user_data->country ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Adresse</div>
                    <div class="col-lg-9 col-md-8">{{$user_data->address ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Contact</div>
                    <div class="col-lg-9 col-md-8">(255) {{$user_data->phone ?? ''}}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{$user_data->email ?? ''}}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->

                    <livewire:profile-image-edit :existingImage="$user_data->image" />
                        {{-- this is to pass image from datbase to edit image component --}}
                        {{-- create component for the remaining form --}}
                    <livewire:profile-details-edit :fullName="$user_data->name" />

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Notifications Email</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Modifications apportées à votre compte
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Informations sur les nouveaux produits et services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Offres marketing et promotionnelles
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Alertes de sécurité
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                    </div>
                  </form><!-- End settings Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Mot de passe actuel</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Nouveau mot de passe</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Ressaisissez le nouveau mot de passe</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
