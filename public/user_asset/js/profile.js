// Tab switching with smooth animation
    const tabs = document.querySelectorAll('.profile-tab');
    const formContents = document.querySelectorAll('.profile-form-content');
    
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const target = tab.getAttribute('data-tab');
            
            // Remove active class from all tabs and content
            tabs.forEach(t => t.classList.remove('active'));
            formContents.forEach(content => {
                content.classList.remove('active');
                content.style.display = 'none';
            });
            
            // Add active class to clicked tab
            tab.classList.add('active');
            
            // Show the selected content with animation
            const selectedContent = document.getElementById(target);
            selectedContent.style.display = 'block';
            selectedContent.classList.add('active');
            
            // Scroll to the top of the form content
            selectedContent.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    // Avatar preview with zoom effect
    const avatarUpload = document.getElementById('avatar-upload');
    const avatarPreview = document.getElementById('avatar-preview');
    
    avatarUpload.addEventListener('change', function () {
        const file = this.files[0];
        if (file) {
            // Validate file size (max 2MB)
            if (file.size > 2 * 1024 * 1024) {
                alert('Image size should not exceed 2MB');
                this.value = '';
                return;
            }
            
            const reader = new FileReader();
            reader.onload = function (e) {
                avatarPreview.src = e.target.result;
                avatarPreview.style.transform = 'scale(1.05)';
                setTimeout(() => {
                    avatarPreview.style.transform = 'scale(1)';
                }, 300);
            }
            reader.readAsDataURL(file);
        }
    });

    // Form validation and submission
    document.getElementById('personal-form').addEventListener('submit', function (e) {
        e.preventDefault();
        
        // Basic validation
        const fullName = document.getElementById('fullName').value;
        const email = document.getElementById('email').value;
        
        if (!fullName || !email) {
            alert('Please fill in all required fields');
            return;
        }
        
        // Email validation
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert('Please enter a valid email address');
            return;
        }
        
        // Success message with animation
        const btn = this.querySelector('.profile-btn-primary');
        btn.innerHTML = '<i class="fas fa-check-circle"></i> Saved!';
        btn.style.backgroundColor = '#4cd964';
        
        setTimeout(() => {
            btn.innerHTML = '<i class="fas fa-save"></i> Save Changes';
            btn.style.backgroundColor = '';
        }, 2000);
        
        // Here you would submit the form data to the server
    });

    // Account form with password validation
    document.getElementById('account-form').addEventListener('submit', function (e) {
        e.preventDefault();
        
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        
        if (password !== confirmPassword) {
            alert('Passwords do not match!');
            return;
        }
        
        if (password && password.length < 8) {
            alert('Password must be at least 8 characters long');
            return;
        }
        
        // Success message
        const btn = this.querySelector('.profile-btn-primary');
        btn.innerHTML = '<i class="fas fa-check-circle"></i> Updated!';
        btn.style.backgroundColor = '#4cd964';
        
        setTimeout(() => {
            btn.innerHTML = '<i class="fas fa-shield-alt"></i> Update Security';
            btn.style.backgroundColor = '';
        }, 2000);
    });

    // Export Excel with animation
    document.getElementById('exportExcel').addEventListener('click', function () {
        // Show loading icon
        const originalText = this.innerHTML;
        this.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Exporting...';
        
        setTimeout(() => {
            const formData = {
                'Full Name': document.getElementById('fullName').value || 'N/A',
                'Email': document.getElementById('email').value || 'N/A',
                'Phone': document.getElementById('phone').value || 'N/A',
                'Date of Birth': document.getElementById('dob').value || 'N/A',
                'Address': document.getElementById('address').value || 'N/A',
                'Gender': document.getElementById('gender').value || 'N/A'
            };
            
            const ws = XLSX.utils.json_to_sheet([formData]);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "Personal Information");
            XLSX.writeFile(wb, "Personal_Information.xlsx");
            
            // Restore button text
            this.innerHTML = originalText;
        }, 1000);
    });