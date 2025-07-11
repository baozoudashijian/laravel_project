CREATE TABLE `tbl_admin_role_permission` (
    `id`         INT(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID',
    `name`       VARCHAR(10)      NOT NULL COMMENT '姓名',
    `age`        TINYINT(10)      NOT NULL COMMENT '年龄',
    `created_at` DATETIME         NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    `updated_at` DATETIME         NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COMMENT = '用户管理';
