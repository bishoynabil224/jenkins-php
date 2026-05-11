pipeline {

    agent { label 'php-lab' } 

    stages {
        stage('Checkout') {
            steps {
            
                checkout scm
            }
        }

        stage('Run Unit Tests') {
            steps {
                catchError(buildResult: 'SUCCESS', stageResult: 'FAILURE') {
                    // التأكد من مسار phpunit (لو مش متأكد استخدم 'phpunit' بس لو مضاف للـ PATH)
                    sh 'phpunit --log-junit results.xml tests/'
                }
            }
        }

        stage('Display Results') {
            steps {
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
