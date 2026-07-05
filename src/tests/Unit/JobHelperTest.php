<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Helpers\JobHelper;

class JobHelperTest extends TestCase
{
    /**
     * ==========================================
     * 1. TEST UNTUK FUNGSI KALKULASI
     * ==========================================
     */
    public function test_calculate_profile_score_happy_case()
    {
        // 1. Arrange
        $profile = [
            'name' => 'Argya',
            'email' => 'argya@email.com',
            'phone' => '08123456',
            'address' => '' // 1 field kosong dari total 4
        ];
        // Ekspektasi: 3/4 field terisi * 100 = 75%
        $expectedScore = 75;

        // 2. Act
        $actualScore = JobHelper::calculateProfileScore($profile);

        // 3. Assert
        $this->assertEquals($expectedScore, $actualScore);
    }

    public function test_calculate_profile_score_edge_case_empty_array()
    {
        // 1. Arrange (array kosong)
        $profile = [];
        $expectedScore = 0;

        // 2. Act
        $actualScore = JobHelper::calculateProfileScore($profile);

        // 3. Assert
        $this->assertEquals($expectedScore, $actualScore);
    }

    /**
     * ==========================================
     * 2. TEST UNTUK FUNGSI VALIDASI
     * ==========================================
     */
    public function test_is_password_strong_happy_case()
    {
        // 1. Arrange (panjang >= 8 dan ada angka)
        $password = 'Secret123!';
        
        // 2. Act
        $isValid = JobHelper::isPasswordStrong($password);

        // 3. Assert
        $this->assertTrue($isValid);
    }

    public function test_is_password_strong_edge_case_no_number()
    {
        // 1. Arrange (password panjang tapi tidak ada angka)
        $password = 'SecretPassword';
        
        // 2. Act
        $isValid = JobHelper::isPasswordStrong($password);

        // 3. Assert
        $this->assertFalse($isValid);
    }

    public function test_is_password_strong_edge_case_too_short()
    {
        // 1. Arrange (ada angka tapi kurang dari 8 karakter)
        $password = 'Sec12';
        
        // 2. Act
        $isValid = JobHelper::isPasswordStrong($password);

        // 3. Assert
        $this->assertFalse($isValid);
    }

    /**
     * ==========================================
     * 3. TEST UNTUK FUNGSI TRANSFORMASI DATA
     * ==========================================
     */
    public function test_format_salary_range_happy_case()
    {
        // 1. Arrange
        $min = 5000000;
        $max = 10000000;
        $expectedFormat = 'Rp 5.000.000 - Rp 10.000.000';

        // 2. Act
        $actualFormat = JobHelper::formatSalaryRange($min, $max);

        // 3. Assert
        $this->assertEquals($expectedFormat, $actualFormat);
    }

    public function test_format_salary_range_edge_case_both_null()
    {
        // 1. Arrange
        $min = null;
        $max = null;
        $expectedFormat = 'Gaji tidak dicantumkan';

        // 2. Act
        $actualFormat = JobHelper::formatSalaryRange($min, $max);

        // 3. Assert
        $this->assertEquals($expectedFormat, $actualFormat);
    }
    /**
     * ==========================================
     * 4. TEST UNTUK FUNGSI GENERATE SLUG
     * ==========================================
     */
    public function test_generate_slug_happy_case()
    {
        // 1. Arrange
        $title = 'Senior Laravel Developer 2024';
        $expected = 'senior-laravel-developer-2024';

        // 2. Act
        $actual = JobHelper::generateSlug($title);

        // 3. Assert
        $this->assertEquals($expected, $actual);
    }

    public function test_generate_slug_edge_case_special_chars()
    {
        // 1. Arrange (string dengan simbol dan banyak spasi)
        $title = '  UI/UX Designer & Researcher!  ';
        $expected = 'ui-ux-designer-researcher';

        // 2. Act
        $actual = JobHelper::generateSlug($title);

        // 3. Assert
        $this->assertEquals($expected, $actual);
    }

    /**
     * ==========================================
     * 5. TEST UNTUK FUNGSI EXPERIENCE LEVEL
     * ==========================================
     */
    public function test_calculate_experience_level()
    {
        // 1. Arrange & 2. Act (bisa digabung untuk test return beruntun yang sederhana)
        $junior = JobHelper::calculateExperienceLevel(1);
        $mid = JobHelper::calculateExperienceLevel(4);
        $senior = JobHelper::calculateExperienceLevel(6);
        
        // Edge case (minus)
        $invalid = JobHelper::calculateExperienceLevel(-1);

        // 3. Assert
        $this->assertEquals('Junior', $junior);
        $this->assertEquals('Mid-level', $mid);
        $this->assertEquals('Senior', $senior);
        $this->assertEquals('Invalid', $invalid);
    }
}
