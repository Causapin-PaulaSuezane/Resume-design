<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $user->name }} - Resume</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #E8F4FD 0%, #B3E0FF 50%, #A6CDDE 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .resume-container {
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .sidebar {
            background: linear-gradient(135deg, #5092b3 0%, #7eb3d1 100%);
            color: white;
            padding: 50px 35px;
        }

        .profile-circle {
            width: 140px;
            height: 140px;
            border-radius: 50%;
            margin: 0 auto 25px;
            border: 5px solid white;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            font-weight: 700;
            color: #5092b3;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.3);
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 15px;
            font-size: 14px;
            line-height: 1.6;
        }

        .contact-label {
            min-width: 70px;
            font-weight: 600;
            opacity: 0.9;
        }

        .skill-item {
            margin-bottom: 20px;
        }

        .skill-name {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 8px;
            display: flex;
            justify-content: space-between;
        }

        .skill-bar {
            height: 8px;
            background: rgba(255, 255, 255, 0.25);
            border-radius: 4px;
            overflow: hidden;
        }

        .skill-fill {
            height: 100%;
            background: white;
            border-radius: 4px;
            transition: width 1.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .main-content {
            padding: 50px 45px;
        }

        .main-section-title {
            color: #2c5f7a;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 25px;
            padding-bottom: 12px;
            border-bottom: 3px solid #5092b3;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .about-text {
            color: #4a5568;
            line-height: 1.8;
            font-size: 15px;
            text-align: justify;
        }

        .education-item {
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #e2e8f0;
        }

        .education-item:last-child {
            border-bottom: none;
        }

        .education-program {
            font-size: 18px;
            font-weight: 700;
            color: #2c5f7a;
            margin-bottom: 8px;
        }

        .education-school {
            font-size: 15px;
            color: #4a5568;
            margin-bottom: 5px;
        }

        .education-years {
            font-size: 13px;
            color: #718096;
        }

        .project-card {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .project-card:hover {
            border-color: #5092b3;
            box-shadow: 0 8px 20px rgba(80, 146, 179, 0.15);
            transform: translateY(-2px);
        }

        .project-title {
            font-size: 18px;
            font-weight: 700;
            color: #2c5f7a;
            margin-bottom: 12px;
        }

        .project-description {
            font-size: 14px;
            color: #4a5568;
            line-height: 1.6;
            margin-bottom: 15px;
        }

        .project-link {
            color: #5092b3;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: color 0.3s ease;
        }

        .project-link:hover {
            color: #2c5f7a;
        }

        .print-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, #5092b3 0%, #7eb3d1 100%);
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 600;
            box-shadow: 0 10px 30px rgba(80, 146, 179, 0.3);
            cursor: pointer;
            border: none;
            font-size: 15px;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        .print-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(80, 146, 179, 0.4);
        }

        .footer-note {
            text-center;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #e2e8f0;
            color: #718096;
            font-size: 13px;
        }

        @media print {
            body {
                background: white;
                padding: 0;
            }
            .print-btn {
                display: none;
            }
            .resume-container {
                box-shadow: none;
            }
        }

        @media (max-width: 768px) {
            .resume-container {
                margin: 20px 10px;
            }
            .sidebar {
                padding: 30px 20px;
            }
            .main-content {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="resume-container">
        <div class="grid grid-cols-1 md:grid-cols-3">
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="text-center mb-8">
                    <div class="profile-circle" style="padding: 0; overflow: hidden;">
                        @if($user->profile_image)
                            <img src="{{ asset($user->profile_image) }}" alt="{{ $user->name }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; font-size: 48px; font-weight: 700; color: #5092b3;">
                                {{ strtoupper(substr($user->name, 0, 2)) }}
                            </div>
                        @endif
                    </div>
                    <h1 class="text-3xl font-bold mb-2">{{ $user->name }}</h1>
                    <p class="text-lg opacity-90">Professional Portfolio</p>
                </div>

                <!-- Contact -->
                <div class="mb-8">
                    <div class="section-title">Contact</div>
                    @if($user->phone)
                        <div class="contact-item">
                            <span class="contact-label">Phone</span>
                            <span>{{ $user->phone }}</span>
                        </div>
                    @endif
                    <div class="contact-item">
                        <span class="contact-label">Email</span>
                        <span class="break-all">{{ $user->email }}</span>
                    </div>
                    @if($user->address)
                        <div class="contact-item">
                            <span class="contact-label">Address</span>
                            <span>{{ $user->address }}</span>
                        </div>
                    @endif
                    @if($user->github)
                        <div class="contact-item">
                            <span class="contact-label">GitHub</span>
                            <span class="break-all">{{ $user->github }}</span>
                        </div>
                    @endif
                </div>

                <!-- Skills -->
                @if($user->skills && count($user->skills) > 0)
                    <div>
                        <div class="section-title">Skills</div>
                        @foreach($user->skills as $skill)
                            <div class="skill-item">
                                <div class="skill-name">
                                    <span>{{ $skill['name'] }}</span>
                                    <span>{{ $skill['level'] }}%</span>
                                </div>
                                <div class="skill-bar">
                                    <div class="skill-fill" style="width: {{ $skill['level'] }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Main Content -->
            <div class="main-content md:col-span-2">
                <!-- About Me -->
                @if($user->about_me)
                    <div class="mb-12">
                        <h2 class="main-section-title">About Me</h2>
                        <p class="about-text">{{ $user->about_me }}</p>
                    </div>
                @endif

                <!-- Education -->
                @if($user->education && count($user->education) > 0)
                    <div class="mb-12">
                        <h2 class="main-section-title">Education</h2>
                        @foreach($user->education as $edu)
                            <div class="education-item">
                                <div class="education-program">{{ $edu['program'] ?? 'Program' }}</div>
                                <div class="education-school">{{ $edu['school'] ?? 'School' }}</div>
                                <div class="education-years">{{ $edu['years'] ?? 'Years' }}</div>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Projects -->
                @if($user->projects && count($user->projects) > 0)
                    <div class="mb-12">
                        <h2 class="main-section-title">Projects</h2>
                        @foreach($user->projects as $project)
                            <div class="project-card">
                                <div class="project-title">{{ $project['name'] }}</div>
                                <div class="project-description">{{ $project['description'] }}</div>
                                @if(!empty($project['link']))
                                    <a href="{{ $project['link'] }}" target="_blank" class="project-link">
                                        View Project →
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif

                @if(!$user->about_me && (!$user->education || count($user->education) === 0) && (!$user->projects || count($user->projects) === 0))
                    <div class="text-center py-20">
                        <h3 class="text-2xl font-bold text-gray-400 mb-3">Portfolio in Progress</h3>
                        <p class="text-gray-500">Content is being added...</p>
                    </div>
                @endif

                <!-- Footer -->
                <div class="footer-note">
                    <p>Professional Portfolio • Generated with Laravel</p>
                    <p class="mt-2">{{ date('F d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Print Button -->
    <button onclick="window.print()" class="print-btn">
        Print Resume
    </button>

    <script>
        // Animate skill bars on load
        window.addEventListener('load', function() {
            setTimeout(() => {
                const skillFills = document.querySelectorAll('.skill-fill');
                skillFills.forEach((fill) => {
                    const width = fill.style.width;
                    fill.style.width = '0%';
                    setTimeout(() => {
                        fill.style.width = width;
                    }, 100);
                });
            }, 300);
        });
    </script>
</body>
</html>
