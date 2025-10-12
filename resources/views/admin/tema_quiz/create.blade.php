<div class="add-task-modal">
    <div class="modal fade" id="createModaltemaQuiz" tabindex="-1" aria-hidden="false">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content card-style">
                <div class="modal-body">
                    <div class="form-layout-wrapper">
                        <div class="col-lg-12">
                            <div class="card-style">
                                <h2 class="mb-25">Form Tambah Tema Quiz</h2>

                                <form id="formTemaQuiz" action="{{ route('tema_quiz.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-style-1">
                                                <div class="update-image">
                                                    <label>Gambar</label>
                                                    <input type="file" name="image" accept="image/*" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-style-1">
                                                <label>Minggu</label>
                                                <input name="week" type="number" placeholder="Masukkan minggu ke" required />
                                            </div>
                                        </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-style-1">
                                                <label>Judul</label>
                                                <input name="title" type="text" placeholder="Masukkan judul" required />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-style-1">
                                                <label>Topik</label>
                                                <input name="topik" type="text" placeholder="Masukkan topik" />
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-style-1">
                                                <label>Materi Relevan</label>
                                                <input name="materi_relevan" type="text" placeholder="Masukkan materi relevan" />
                                            </div>
                                        </div>
                                        </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Deskripsi</label>
                                                <textarea name="description" placeholder="Masukkan deskripsi" rows="5"></textarea>
                                            </div>
                                        </div>
                                        </div>

                                    <div class="col-12">
                                        <div class="button-group d-flex justify-content-center flex-wrap">
                                            <button type="submit" class="main-btn primary-btn btn-hover m-2">
                                                <i class="lni lni-checkmark-circle"></i> Save
                                            </button>
                                            <button type="button" data-bs-dismiss="modal"
                                                class="main-btn danger-btn-outline m-2">
                                                <i class="lni lni-cross-circle"></i> Cancel
                                            </button>
                                        </div>
                                    </div>
                                    </form>
                            </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
