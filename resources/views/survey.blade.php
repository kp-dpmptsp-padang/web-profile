@extends('layouts.main')
@section('content')
<div class="pt-24 min-h-screen bg-gradient-to-br from-gray-50 to-red-50 py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Background Decorative Elements -->
    <div class="absolute inset-0 z-0">
        <div class="absolute top-0 -left-8 w-80 h-80 bg-red-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-10 -right-6 w-80 h-80 bg-pink-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-0 left-10 w-80 h-80 bg-orange-100 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>

    <div class="relative z-10">
        <div class="max-w-2xl mx-auto">
            <!-- Progress Steps -->
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

            <!-- Form Container -->
            <div class="bg-white shadow-lg rounded-xl p-8">
                <form id="surveyForm" method="POST" action="{{ route('survey.store') }}" class="space-y-6">
                    @csrf
                    
                    <!-- Step 1: Data Diri -->
                    <div class="step step-1">
                        <h3 class="text-lg font-semibold text-gray-900 border-b pb-2 mb-4">Data Diri</h3>
                        <div class="space-y-4">
                            <div class="form-group">
                                <label for="noHp" class="block text-sm font-medium text-gray-700 mb-1">No. HP</label>
                                <input type="tel" id="noHp" name="noHp" class="form-input w-full h-10 rounded-lg border border-red-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50" required>
                            </div>
                            <div class="form-group">
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                <input type="text" id="name" name="name" class="form-input w-full h-10 rounded-lg border border-red-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50" required>
                            </div>
                            <div class="form-group">
                                <label for="job" class="block text-sm font-medium text-gray-700 mb-1">Pekerjaan</label>
                                <select id="job" name="job" class="form-select w-full h-10 rounded-lg border border-red-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50 bg-white" required>
                                    <option value="" disabled selected>Pilih Pekerjaan</option>
                                    <option value="PNS">PNS</option>
                                    <option value="TNI/POLRI">TNI/POLRI</option>
                                    <option value="Swasta">Swasta</option>
                                    <option value="Wiraswasta">Wiraswasta</option>
                                    <option value="Pelajar">Pelajar</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Survey Questions -->
                    <div class="step step-2 hidden opacity-0">
                        <h3 class="text-lg font-semibold text-gray-900 border-b pb-2 mb-4">Survey Kepuasan Layanan</h3>
                        <div class="space-y-8">
                            <!-- Question 1 -->
                            <div class="space-y-4">
                                <p class="text-gray-700 font-medium">1. Bagaimana pelaksanaan SOP di DPMPTSP?</p>
                                <div class="grid grid-cols-2 gap-4">
                                    <label class="relative flex items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-red-50 transition-colors radio-container">
                                        <input type="radio" name="sop_rating" value="4" class="absolute inset-0 opacity-0 cursor-pointer" required>
                                        <span class="text-sm text-gray-700">Sangat Baik</span>
                                    </label>
                                    <label class="relative flex items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-red-50 transition-colors radio-container">
                                        <input type="radio" name="sop_rating" value="3" class="absolute inset-0 opacity-0 cursor-pointer" required>
                                        <span class="text-sm text-gray-700">Baik</span>
                                    </label>
                                    <label class="relative flex items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-red-50 transition-colors radio-container">
                                        <input type="radio" name="sop_rating" value="2" class="absolute inset-0 opacity-0 cursor-pointer" required>
                                        <span class="text-sm text-gray-700">Kurang Baik</span>
                                    </label>
                                    <label class="relative flex items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-red-50 transition-colors radio-container">
                                        <input type="radio" name="sop_rating" value="1" class="absolute inset-0 opacity-0 cursor-pointer" required>
                                        <span class="text-sm text-gray-700">Tidak Baik</span>
                                    </label>
                                </div>
                            </div>

                            <!-- Question 2 -->
                            <div class="space-y-4">
                                <p class="text-gray-700 font-medium">2. Bagaimana kecepatan pelayanan di DPMPTSP?</p>
                                <div class="grid grid-cols-2 gap-4">
                                    <label class="relative flex items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-red-50 transition-colors radio-container">
                                        <input type="radio" name="speed_rating" value="4" class="absolute inset-0 opacity-0 cursor-pointer" required>
                                        <span class="text-sm text-gray-700">Sangat Baik</span>
                                    </label>
                                    <label class="relative flex items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-red-50 transition-colors radio-container">
                                        <input type="radio" name="speed_rating" value="3" class="absolute inset-0 opacity-0 cursor-pointer" required>
                                        <span class="text-sm text-gray-700">Baik</span>
                                    </label>
                                    <label class="relative flex items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-red-50 transition-colors radio-container">
                                        <input type="radio" name="speed_rating" value="2" class="absolute inset-0 opacity-0 cursor-pointer" required>
                                        <span class="text-sm text-gray-700">Kurang Baik</span>
                                    </label>
                                    <label class="relative flex items-center justify-center p-4 border rounded-lg cursor-pointer hover:bg-red-50 transition-colors radio-container">
                                        <input type="radio" name="speed_rating" value="1" class="absolute inset-0 opacity-0 cursor-pointer" required>
                                        <span class="text-sm text-gray-700">Tidak Baik</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Kritik & Saran -->
                    <div class="step step-3 hidden opacity-0">
                        <h3 class="text-lg font-semibold text-gray-900 border-b pb-2 mb-4">Kritik/Saran</h3>
                        <div class="space-y-4">
                            <div class="form-group">
                                <label for="kritik" class="block text-sm font-medium text-gray-700 mb-1">Kritik/Saran</label>
                                <textarea id="kritik" name="kritik" rows="3" class="form-textarea w-full rounded-lg border border-red-300 shadow-sm focus:border-red-500 focus:ring focus:ring-red-200 focus:ring-opacity-50" placeholder="Masukkan kritik/saran Anda"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Buttons -->
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

<script>
document.addEventListener('DOMContentLoaded', function() {
    let currentStep = 1;
    const totalSteps = 3;
    const form = document.getElementById('surveyForm');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');
    const submitBtn = document.getElementById('submitBtn');
    const progressBar = document.querySelector('.progress-bar');

    // Handle next button click
    nextBtn.addEventListener('click', function() {
        if (validateStep(currentStep)) {
            if (currentStep < totalSteps) {
                switchStep(currentStep, currentStep + 1);
                currentStep++;
                progressBar.style.width = `${(currentStep/totalSteps) * 100}%`;
                updateButtons();
                updateStepText();
            }
        }
    });

    // Handle previous button click
    prevBtn.addEventListener('click', function() {
        if (currentStep > 1) {
            switchStep(currentStep, currentStep - 1);
            currentStep--;
            progressBar.style.width = `${(currentStep/totalSteps) * 100}%`;
            updateButtons();
            updateStepText();
        }
    });

    // Radio button click handler for better UX
    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', function() {
            const container = this.closest('.grid');
            container.querySelectorAll('label').forEach(label => {
                label.classList.remove('bg-red-50', 'border-red-500');
            });
            this.closest('label').classList.add('bg-red-50', 'border-red-500');
        });
    });

    // Handle form submission
    form.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        if (validateStep(currentStep)) {
            const formData = new FormData(this);
            
            try {
                const response = await fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                });

                if (response.ok) {
                    alert('Terima kasih atas feedback Anda!');
                    window.location.href = '{{ route("survey.thanks") }}';
                } else {
                    throw new Error('Something went wrong');
                }
            } catch (error) {
                alert('Terjadi kesalahan. Silakan coba lagi.');
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
        const requiredFields = currentStepElement.querySelectorAll('[required]');
        let isValid = true;

        // Reset previous error messages
        currentStepElement.querySelectorAll('.error-message').forEach(el => el.remove());
        currentStepElement.querySelectorAll('.border-red-500').forEach(el => {
            el.classList.remove('border-red-500');
        });
        
        switch(step) {
            case 1: // Data Diri
                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        isValid = false;
                        showError(field, 'Field ini wajib diisi');
                    }
                    // Phone number validation
                    if (field.id === 'noHp' && !validatePhone(field.value)) {
                        isValid = false;
                        showError(field, 'Format nomor HP tidak valid');
                    }
                });
                break;

            case 2: // Survey Questions
                const questions = ['sop_rating', 'speed_rating'];
                questions.forEach(questionName => {
                    const answered = document.querySelector(`input[name="${questionName}"]:checked`);
                    if (!answered) {
                        isValid = false;
                        const questionGroup = document.querySelector(`input[name="${questionName}"]`).closest('.space-y-4');
                        showError(questionGroup, 'Mohon pilih salah satu jawaban');
                    }
                });
                break;

            case 3: // Kritik & Saran
                const kritik = document.getElementById('kritik');
                if (!kritik.value.trim()) {
                    // Make it optional, just show a gentle reminder
                    showError(kritik, 'Mohon berikan kritik/saran Anda untuk membantu kami meningkatkan layanan', 'text-yellow-500');
                }
                break;
        }

        return isValid;
    }

    function showError(element, message, colorClass = 'text-red-500') {
        // Remove existing error message if any
        const existingError = element.parentElement.querySelector('.error-message');
        if (existingError) {
            existingError.remove();
        }

        // Add error class to element
        if (colorClass === 'text-red-500') {
            element.classList.add('border-red-500');
        }
        
        // Create and append error message
        const errorDiv = document.createElement('div');
        errorDiv.className = `error-message ${colorClass} text-sm mt-1`;
        errorDiv.textContent = message;
        element.parentElement.appendChild(errorDiv);
    }

    function validatePhone(phone) {
        // Indonesian phone number format validation
        const phoneRegex = /^(\+62|62|0)8[1-9][0-9]{6,9}$/;
        return phoneRegex.test(phone.replace(/[-\s]/g, ''));
    }

    // Remove error indication on input change
    document.querySelectorAll('input, textarea, select').forEach(element => {
        element.addEventListener('input', function() {
            this.classList.remove('border-red-500');
            const errorMessage = this.parentElement.querySelector('.error-message');
            if (errorMessage) {
                errorMessage.remove();
            }
        });
    });

    // Function to handle step transitions with animation
    function switchStep(from, to) {
        const fromStep = document.querySelector(`.step-${from}`);
        const toStep = document.querySelector(`.step-${to}`);

        // Add transition classes
        fromStep.classList.add('opacity-0');
        
        setTimeout(() => {
            fromStep.classList.add('hidden');
            toStep.classList.remove('hidden');
            
            // Force a reflow before removing opacity-0
            void toStep.offsetWidth;
            
            toStep.classList.remove('opacity-0');
        }, 300);
    }
});
</script>