@extends('layouts.main')
@section('title', 'Survey | DPMPTSP Kota Padang')
<style>
    .step {
        display: block !important;
    }

    .step.hidden {
        display: none !important;
    }
    
    .step.fade-enter {
        opacity: 0;
    }
    
    .step.fade-enter-active {
        opacity: 1;
        transition: opacity 0.3s ease-out;
    }
</style>
@section('content')
<div class="pt-24 min-h-screen bg-gradient-to-br from-gray-50 to-red-50 py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-0 -left-8 w-80 h-80 bg-red-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-10 -right-6 w-80 h-80 bg-pink-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-0 left-10 w-80 h-80 bg-orange-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative z-10">
        <div class="max-w-2xl mx-auto">
            <div class="mb-8">
                <div class="flex justify-between mb-2">
                    <span class="text-sm step-text step-1 text-red-600 font-medium">Data Diri</span>
                    <span class="text-sm step-text step-2 text-gray-400">Survey Kepuasan</span>
                    <span class="text-sm step-text step-3 text-gray-400">Kritik/Saran</span>
                </div>
                <div class="w-full h-2 bg-gray-200 rounded-full">
                    <div class="progress-bar h-full bg-red-600 rounded-full transition-all duration-300" style="width: 33%"></div>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-xl px-8 py-2 pb-8">
                <form id="surveyForm" method="POST" action="{{ route('survey.store') }}" class="space-y-6">
                    @csrf
                    
                    <div class="step step-1">
                        <h3 class="text-lg font-semibold text-gray-900 border-b pb-2 mb-4">Data Diri</h3>
                        <p class="text-sm text-gray-600 mb-4 text-center">Kolom dengan tanda <span class="text-red-500">*</span> wajib diisi</p>
                        <div class="space-y-4">
                            <div class="form-group">
                                <label for="noHp" class="block text-sm font-medium text-gray-700 mb-1">No. HP<span class="text-red-500">*</span></label>
                                <input type="tel" id="noHp" name="noHp" class="form-input w-full h-10 rounded-lg border border-red-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                            </div>
                            <div class="form-group">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" id="name" name="name" class="form-input w-full h-10 rounded-lg border border-red-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                            </div>
                            <div class="form-group">
                                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                                <input type="text" id="alamat" name="alamat" class="form-input w-full h-10 rounded-lg border border-red-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                            </div>
                            <div class="form-group">
                                <label for="usia" class="block text-sm font-medium text-gray-700 mb-1">Usia<span class="text-red-500">*</span></label>
                                <input type="text" inputmode="numeric" id="usia" name="usia" class="form-input w-full h-10 rounded-lg border border-red-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50">
                            </div>
                            <div class="form-group">
                                <label for="jk" class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin<span class="text-red-500">*</span></label>
                                <select id="jk" name="jk" class="form-select w-full h-10 rounded-lg border border-red-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 bg-white">
                                    <option value="" disabled selected hidden>Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="pendidikan" class="block text-sm font-medium text-gray-700 mb-1">Pendidikan<span class="text-red-500">*</span></label>
                                <select id="pendidikan" name="pendidikan" class="form-select w-full h-10 rounded-lg border border-red-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 bg-white">
                                    <option value="" disabled selected hidden>Pilih Pendidikan</option>
                                    <option value="SD/MI">SD/MI</option>
                                    <option value="SMP/MTs">SMP/MTs</option>
                                    <option value="SMA/SMK/MA">SMA/SMK/MA</option>
                                    <option value="D1">D1</option>
                                    <option value="D2">D2</option>
                                    <option value="D3">D3</option>
                                    <option value="D4">D4</option>
                                    <option value="S1">S1</option>
                                    <option value="S2">S2</option>
                                    <option value="S3">S3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="job" class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan<span class="text-red-500">*</span></label>
                                <select id="job" name="job" class="form-select w-full h-10 rounded-lg border border-red-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 bg-white">
                                    <option value="" disabled selected hidden>Pilih Pekerjaan</option>
                                    <option value="PNS">PNS</option>
                                    <option value="TNI/POLRI">TNI/POLRI</option>
                                    <option value="Swasta">Swasta</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Pelajar">Pelajar</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="layanan" class="block text-sm font-medium text-gray-700 mb-1">Jenis Layanan yang Diterima<span class="text-red-500">*</span></label>
                                <select id="layanan" name="layanan" class="form-select w-full h-10 rounded-lg border border-red-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 bg-white">
                                    <option value="" disabled selected hidden>Pilih Layanan</option>
                                    <option value="NIB">NIB</option>
                                    <option value="NIB + Sertifikat Standar">NIB + Sertifikat Standar</option>
                                    <option value="Izin + Sertifikat Standar">Izin + Sertifikat Standar</option>
                                    <option value="Laporan Kegiatan Penanam Modal">Lapopran Kegiatan Penanam Modal</option>
                                    <option value="Pengambilan Hasil">Pengambilan Hasil</option>
                                    <option value="Izin Lainnya">Izin Lainnya</option>
                                </select>
                            </div>
                        </div>
                        <div class="absolute bottom-4 left-4">
                            <button type="button" class="bg-red-500 text-white py-2 px-4 rounded-lg shadow hover:bg-red-600 focus:outline-none focus:ring focus:ring-red-200 focus:ring-opacity-50">
                                Kembali
                            </button>
                        </div>
                    </div>

                    <div class="step step-2 hidden">
                        <h3 class="text-lg font-semibold text-gray-900 border-b pb-2 mb-4">Survey Kepuasan Layanan</h3>
                        <div class="space-y-8">
                            @foreach ($questions as $question)
                                <div class="space-y-4">
                                    <p class="text-gray-700 font-medium">{{ $loop->iteration }}. {{ $question->question_text }}</p>
                                    <div class="grid grid-cols-2 gap-4">
                                        @foreach ($question->options as $option)
                                            <label class="relative flex items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-red-50 transition-colors radio-container">
                                                <input 
                                                    type="radio" 
                                                    name="{{ $question->id }}_rating" 
                                                    id="option_{{ $option->id }}"
                                                    value="{{ $option->option_value }}" 
                                                    class="absolute inset-0 opacity-0 cursor-pointer"
                                                >
                                                <span class="text-sm text-gray-700">{{ $option->option_text }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="step step-3 hidden">
                        <h3 class="text-lg font-semibold text-gray-900 border-b pb-2 mb-4">Kritik/Saran</h3>
                        <div class="space-y-4">
                            <div class="form-group">
                                <textarea id="kritik" name="kritik" rows="3" class="form-textarea w-full rounded-lg border border-red-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50" placeholder="Masukkan kritik/saran Anda"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between pt-6">
                        <button type="button" id="prevBtn" class="hidden px-6 py-2 border border-red-300 text-red-600 rounded-lg hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Sebelumnya
                        </button>
                        <button type="button" id="nextBtn" class="ml-auto px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Selanjutnya
                        </button>
                        <button type="submit" id="submitBtn" class="hidden ml-auto px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            Kirim Survey
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentStep = 1;
    const totalSteps = 3;
    const form = document.getElementById('surveyForm');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const submitBtn = document.getElementById('submitBtn');
    const progressBar = document.querySelector('.progress-bar');

    nextBtn.addEventListener('click', function() {
        if (validateStep(currentStep)) {
            switchStep(currentStep, currentStep + 1);
            currentStep++;
            progressBar.style.width = `${(currentStep/totalSteps) * 100}%`;
            updateButtons();
            updateStepText();
        }
    });

    prevBtn.addEventListener('click', function() {
        if (currentStep > 1) {
            switchStep(currentStep, currentStep - 1);
            currentStep--;
            progressBar.style.width = `${(currentStep/totalSteps) * 100}%`;
            updateButtons();
            updateStepText();
        }
    });

    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const container = this.closest('.grid');
            container.querySelectorAll('label').forEach(label => {
                label.classList.remove('bg-red-50', 'border-red-500');
            });
            this.closest('label').classList.add('bg-red-50', 'border-red-500');
        });
    });

    document.querySelectorAll('.step').forEach(step => {
        step.addEventListener('transitionend', function(e) {
            if (e.propertyName === 'opacity' && this.style.opacity === '0') {
                this.classList.add('hidden');
            }
        });
    });

    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        if (validateStep(currentStep)) {
            const formData = new FormData(this);
            
            try {
                const response = await fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();

                if (response.ok) {
                    await Swal.fire({
                        icon: 'success',
                        title: 'Berhasil!',
                        text: data.message || 'Terima kasih atas feedback Anda!',
                        confirmButtonColor: '#dc2626',
                        confirmButtonText: 'OK'
                    });
                    window.location.href = '{{ route("survey") }}';
                } else if (response.status === 422) {
                    const errorMessages = Object.values(data.errors).flat();
                    Swal.fire({
                        icon: 'error',
                        title: 'Validasi Gagal',
                        html: errorMessages.join('<br>'),
                        confirmButtonColor: '#dc2626',
                        confirmButtonText: 'OK'
                    });
                } else {
                    throw new Error(data.message || 'Something went wrong');
                }
            } catch (error) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error.message || 'Terjadi kesalahan. Silakan coba lagi.',
                    confirmButtonColor: '#dc2626',
                    confirmButtonText: 'OK'
                });
                console.error('Error:', error);
            }
        }
    });

    function updateButtons() {
        prevBtn.classList.toggle('hidden', currentStep === 1);
        if (currentStep === totalSteps) {
            nextBtn.classList.add('hidden');
            submitBtn.classList.remove('hidden');
        } else {
            nextBtn.classList.remove('hidden');
            submitBtn.classList.add('hidden');
        }
    }

    function updateStepText() {
        document.querySelectorAll('.step-text').forEach((el, index) => {
            if (index + 1 === currentStep) {
                el.classList.remove('text-gray-400');
                el.classList.add('text-red-600');
            } else {
                el.classList.remove('text-red-600');
                el.classList.add('text-gray-400');
            }
        });
    }

    function validateStep(step) {
        const currentStepElement = document.querySelector(`.step-${step}`);
        if (!currentStepElement) return false;
        
        const requiredFields = currentStepElement.querySelectorAll('[required]');
        let isValid = true;
        let errorMessages = [];

        switch(step) {
            case 1:
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        errorMessages.push(`${field.previousElementSibling.textContent.replace('*', '')} wajib diisi`);
                        field.classList.add('border-red-500');
                        return;
                    }

                    switch(field.id) {
                        case 'noHp':
                            if (!validatePhone(field.value)) {
                                isValid = false;
                                errorMessages.push('Format nomor HP tidak valid');
                                field.classList.add('border-red-500');
                            }
                            break;
                        case 'usia':
                            const age = parseInt(field.value);
                            if (isNaN(age) || age < 1 || age > 120) {
                                isValid = false;
                                errorMessages.push('Usia harus antara 1-120 tahun');
                                field.classList.add('border-red-500');
                            }
                            break;
                        case 'pendidikan':
                            const validEducation = ['SD/MI','SMP/MTs','SMA/SMK/MA','D1','D2','D3','D4','S1','S2','S3'];
                            if (!validEducation.includes(field.value)) {
                                isValid = false;
                                errorMessages.push('Pendidikan tidak valid');
                                field.classList.add('border-red-500');
                            }
                            break;
                        case 'job':
                            const validJobs = ['PNS','TNI/POLRI','Swasta','Wiraswasta','Pelajar','Lainnya'];
                            if (!validJobs.includes(field.value)) {
                                isValid = false;
                                errorMessages.push('Pekerjaan tidak valid');
                                field.classList.add('border-red-500');
                            }
                            break;
                    }
                });
                break;

            case 2:
                const questionGroups = currentStepElement.querySelectorAll('.space-y-4');
                let unansweredCount = 0;
                
                questionGroups.forEach((group) => {
                    const radios = group.querySelectorAll('input[type="radio"]');
                    if (radios.length > 0) {
                        const name = radios[0].name;
                        const answered = document.querySelector(`input[name="${name}"]:checked`);
                        if (!answered) {
                            unansweredCount++;
                            isValid = false;
                        }
                    }
                });

                if (unansweredCount > 0) {
                    if (unansweredCount === questionGroups.length) {
                        errorMessages.push('Mohon isi semua pertanyaan survey yang tersedia');
                    } else {
                        errorMessages.push(`Masih ada ${unansweredCount} pertanyaan yang belum dijawab`);
                    }
                }
                break;
        }

        if (!isValid && errorMessages.length > 0) {
            Swal.fire({
                icon: 'error',
                title: 'Validasi Gagal',
                html: errorMessages.join('<br>'),
                confirmButtonColor: '#dc2626',
                confirmButtonText: 'OK'
            });
        }

        return isValid;
    }

    function validatePhone(phone) {
        const phoneRegex = /^[0-9+]{10,14}$/;
        return phoneRegex.test(phone.replace(/[-\s]/g, ''));
    }

    document.querySelectorAll('input, textarea, select').forEach(element => {
        element.addEventListener('input', function() {
            this.classList.remove('border-red-500');
        });
    });

    function switchStep(from, to) {
        const fromStep = document.querySelector(`.step.step-${from}`);
        const toStep = document.querySelector(`.step.step-${to}`);
        
        fromStep.style.opacity = '0';
        
        setTimeout(() => {
            fromStep.classList.add('hidden');
            toStep.classList.remove('hidden');            
            toStep.style.opacity = '0';
            toStep.offsetHeight; 
            toStep.style.opacity = '1';
        }, 300);
    }
});
</script>