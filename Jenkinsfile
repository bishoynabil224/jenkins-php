pipeline {
    agent { label 'php-lab' } 

    stages {
        // ملحوظة: شلنا مرحلة الـ Checkout اليدوية لأن جينكينز بيعملها أوتوماتيك
        
        stage('Run Unit Tests') {
            steps {
                catchError(buildResult: 'SUCCESS', stageResult: 'FAILURE') {
                    // إضافة --no-cache لحل مشكلة الـ Permission Denied
                    sh 'phpunit --no-cache --log-junit results.xml tests/'
                }
            }
        }

        stage('Display Results') {
            steps {
                // عرض نتائج الاختبارات في واجهة جينكينز
                junit 'results.xml'
            }
        }
    }

    post {
        always {
            echo 'Pipeline job finished.'
        }
        success {
            echo 'Congratulations! All tests passed successfully.'
        }
        failure {
            echo 'The code failed the tests! Please check the Test Result trend for details.'
        }
    }
}
