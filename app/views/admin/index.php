<?php require APPROOT . '/views/layouts/header.php'; ?>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        min-height: 100vh;
        color: #f8fafc;
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    }

    /* Animated Header */
    .admin-hero {
        background: linear-gradient(135deg, rgba(251, 191, 36, 0.9), rgba(217, 119, 6, 0.9));
        backdrop-filter: blur(20px);
        border-radius: 24px;
        padding: 3rem;
        margin-bottom: 2rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.1);
        position: relative;
        overflow: hidden;
    }

    .admin-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        animation: shine 3s infinite;
    }

    @keyframes shine {
        0% { transform: translateX(-100%) translateY(-100%) rotate(45deg); }
        100% { transform: translateX(100%) translateY(100%) rotate(45deg); }
    }

    .hero-content {
        position: relative;
        z-index: 1;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .hero-title h1 {
        font-size: 2.5rem;
        font-weight: 900;
        color: white;
        margin-bottom: 0.5rem;
        text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
    }

    .hero-title p {
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.125rem;
    }

    .hero-badge {
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        padding: 1rem 2rem;
        border-radius: 50px;
        font-weight: 700;
        color: white;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    /* Statistics Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-box {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        padding: 1.5rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        transition: all 0.3s ease;
    }

    .stat-box:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        border-color: rgba(251, 191, 36, 0.5);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
    }

    .stat-box-1 .stat-icon {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        box-shadow: 0 10px 30px rgba(99, 102, 241, 0.4);
    }

    .stat-box-2 .stat-icon {
        background: linear-gradient(135deg, #10b981, #059669);
        box-shadow: 0 10px 30px rgba(16, 185, 129, 0.4);
    }

    .stat-box-3 .stat-icon {
        background: linear-gradient(135deg, #f59e0b, #d97706);
        box-shadow: 0 10px 30px rgba(245, 158, 11, 0.4);
    }

    .stat-box-4 .stat-icon {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        box-shadow: 0 10px 30px rgba(239, 68, 68, 0.4);
    }

    .stat-details h3 {
        font-size: 1.75rem;
        font-weight: 800;
        color: white;
        margin: 0;
    }

    .stat-details p {
        font-size: 0.875rem;
        color: rgba(255, 255, 255, 0.6);
        margin: 0;
    }

    /* Main Card */
    .admin-card {
        background: rgba(255, 255, 255, 0.05);
        backdrop-filter: blur(30px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 25px;
        padding: 2rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        margin-bottom: 2rem;
    }

    .card-header-custom {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: white;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    /* Table Styling */
    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 12px;
    }

    .custom-table thead tr {
        text-transform: uppercase;
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.5);
        font-weight: 700;
        letter-spacing: 1px;
    }

    .custom-table thead th {
        padding: 0 15px 15px 15px;
        text-align: left;
        border: none;
    }

    .custom-table tbody tr {
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.05), rgba(255, 255, 255, 0.02));
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .custom-table tbody tr:hover {
        background: linear-gradient(135deg, rgba(251, 191, 36, 0.15), rgba(217, 119, 6, 0.1));
        transform: translateX(5px);
        box-shadow: 0 10px 30px rgba(251, 191, 36, 0.2);
        border-color: rgba(251, 191, 36, 0.4);
    }

    .custom-table tbody tr td:first-child {
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
    }

    .custom-table tbody tr td:last-child {
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .custom-table td {
        padding: 20px 15px;
        vertical-align: middle;
        border: none;
        color: #cbd5e1;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .user-avatar {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.125rem;
        color: white;
    }

    .user-details .user-name {
        font-weight: 700;
        color: white;
        font-size: 1rem;
        margin-bottom: 0.25rem;
    }

    .user-details .user-role {
        font-size: 0.75rem;
        color: rgba(255, 255, 255, 0.5);
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    /* Status Pills */
    .status-pill {
        padding: 8px 18px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .status-pending {
        background: rgba(245, 158, 11, 0.2);
        color: #fbbf24;
        border: 1px solid rgba(251, 191, 36, 0.3);
    }

    .status-approved {
        background: rgba(16, 185, 129, 0.2);
        color: #34d399;
        border: 1px solid rgba(16, 185, 129, 0.3);
    }

    .status-rejected {
        background: rgba(239, 68, 68, 0.2);
        color: #f87171;
        border: 1px solid rgba(239, 68, 68, 0.3);
    }

    /* Action Buttons */
    .btn-action {
        padding: 10px 20px;
        border-radius: 12px;
        font-size: 0.85rem;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        border: 2px solid;
    }

    .btn-approve {
        border-color: #34d399;
        color: #34d399;
        background: rgba(16, 185, 129, 0.1);
    }

    .btn-approve:hover {
        background: linear-gradient(135deg, #10b981, #059669);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3);
    }

    .btn-reject {
        border-color: #f87171;
        color: #f87171;
        background: rgba(239, 68, 68, 0.1);
    }

    .btn-reject:hover {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px rgba(239, 68, 68, 0.3);
    }

    .date-badge {
        background: rgba(99, 102, 241, 0.2);
        color: #a5b4fc;
        padding: 0.5rem 1rem;
        border-radius: 10px;
        font-weight: 700;
        font-size: 0.875rem;
        display: inline-block;
    }

    .resource-info {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #cbd5e1;
    }

    .purpose-text {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        color: rgba(255, 255, 255, 0.6);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
    }

    .empty-state i {
        font-size: 4rem;
        color: rgba(255, 255, 255, 0.2);
        margin-bottom: 1rem;
    }

    .empty-state h4 {
        color: rgba(255, 255, 255, 0.6);
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: rgba(255, 255, 255, 0.4);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-title h1 {
            font-size: 1.75rem;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }

        .custom-table {
            font-size: 0.85rem;
        }

        .btn-action {
            padding: 8px 12px;
            font-size: 0.75rem;
        }
    }
</style>

<div class="container py-4">
    <!-- Hero Header -->
    <div class="admin-hero">
        <div class="hero-content">
            <div class="hero-title">
                <h1>🔐 Admin Control Panel</h1>
                <p>Manage all campus bookings and approvals</p>
            </div>
            <div class="hero-badge">
                <i class="bi bi-shield-check"></i> System Live: 2026
            </div>
        </div>
    </div>

    <!-- Statistics Grid -->
    <div class="stats-grid">
        <div class="stat-box stat-box-1">
            <div class="stat-icon">
                <i class="bi bi-calendar-check"></i>
            </div>
            <div class="stat-details">
                <h3><?php echo count($data['bookings']); ?></h3>
                <p>Total Requests</p>
            </div>
        </div>

        <div class="stat-box stat-box-2">
            <div class="stat-icon">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stat-details">
                <h3><?php echo count(array_filter($data['bookings'], function($b) { return $b->status == 'Approved'; })); ?></h3>
                <p>Approved</p>
            </div>
        </div>

        <div class="stat-box stat-box-3">
            <div class="stat-icon">
                <i class="bi bi-clock-history"></i>
            </div>
            <div class="stat-details">
                <h3><?php echo count(array_filter($data['bookings'], function($b) { return $b->status == 'Pending'; })); ?></h3>
                <p>Pending</p>
            </div>
        </div>

        <div class="stat-box stat-box-4">
            <div class="stat-icon">
                <i class="bi bi-x-circle"></i>
            </div>
            <div class="stat-details">
                <h3><?php echo count(array_filter($data['bookings'], function($b) { return $b->status == 'Rejected'; })); ?></h3>
                <p>Rejected</p>
            </div>
        </div>
    </div>

    <!-- Main Table Card -->
    <div class="admin-card">
        <div class="card-header-custom">
            <h3 class="card-title">
                <i class="bi bi-list-check"></i>
                Booking Requests
            </h3>
            <span class="badge bg-warning text-dark rounded-pill px-3 py-2">
                <?php echo count(array_filter($data['bookings'], function($b) { return $b->status == 'Pending'; })); ?> Pending Review
            </span>
        </div>

        <?php if(!empty($data['bookings'])): ?>
            <div style="overflow-x: auto;">
                <table class="custom-table">
                    <thead>
                        <tr>
                            <th>User & Role</th>
                            <th>Resource</th>
                            <th>Date & Time</th>
                            <th>Purpose</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($data['bookings'] as $request) : ?>
                        <?php 
                            // Right ID & Date Handle
                            $b_id = isset($request->booking_id) ? $request->booking_id : (isset($request->id) ? $request->id : null);
                            $b_date = isset($request->booking_date) ? $request->booking_date : (isset($request->date) ? $request->date : 'N/A');
                            
                            // Get first letter for avatar
                            $initial = strtoupper(substr($request->user_name, 0, 1));
                        ?>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-avatar"><?php echo $initial; ?></div>
                                    <div class="user-details">
                                        <div class="user-name"><?php echo $request->user_name; ?></div>
                                        <div class="user-role">
                                            <i class="bi bi-person-badge"></i>
                                            <?php echo isset($request->role) ? $request->role : (isset($request->user_role) ? $request->user_role : 'Member'); ?>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="resource-info">
                                    <i class="bi bi-building"></i>
                                    <strong><?php echo $request->resource_name; ?></strong>
                                </div>
                            </td>
                            <td>
                                <div class="date-badge">
                                    <i class="bi bi-calendar-event"></i>
                                    <?php echo date('M d, Y', strtotime($b_date)); ?>
                                </div>
                            </td>
                            <td>
                                <div class="purpose-text" title="<?php echo $request->purpose; ?>">
                                    <?php echo $request->purpose; ?>
                                </div>
                            </td>
                            <td>
                                <span class="status-pill status-<?php echo strtolower($request->status); ?>">
                                    <?php if($request->status == 'Pending'): ?>
                                        <i class="bi bi-clock"></i>
                                    <?php elseif($request->status == 'Approved'): ?>
                                        <i class="bi bi-check-circle"></i>
                                    <?php else: ?>
                                        <i class="bi bi-x-circle"></i>
                                    <?php endif; ?>
                                    <?php echo $request->status; ?>
                                </span>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <?php if($b_id): ?>
                                        <a href="<?php echo URLROOT; ?>/admin/approve/<?php echo $b_id; ?>" 
                                           class="btn-action btn-approve"
                                           onclick="return confirm('Approve this booking request?')">
                                            <i class="bi bi-check2"></i> Approve
                                        </a>
                                        <a href="<?php echo URLROOT; ?>/admin/reject/<?php echo $b_id; ?>" 
                                           class="btn-action btn-reject"
                                           onclick="return confirm('Reject this booking request?')">
                                            <i class="bi bi-x-lg"></i> Reject
                                        </a>
                                    <?php else: ?>
                                        <span class="text-danger small">No ID</span>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="empty-state">
                <i class="bi bi-inbox"></i>
                <h4>No Booking Requests</h4>
                <p>All caught up! No pending requests at the moment.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require APPROOT . '/views/layouts/footer.php'; ?>
